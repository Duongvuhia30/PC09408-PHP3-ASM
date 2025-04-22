<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Group;
use App\Helpers\StringHelper;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Filters\AdvancedFilter;
use Filament\Tables\Columns\IconColumn;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $modelLabel = 'sản phẩm';

    protected static ?string $navigationGroup = 'Sản phẩm';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Tất cả sản phẩm';

    protected static ?string $pluralModelLabel = 'Sản phẩm';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['images']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Section::make('Tên sản phẩm')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Tên sản phẩm')
                                            ->required()
                                            ->maxLength(225)
                                            ->live(onBlur: true)
                                            ->unique(ignoreRecord: true)
                                            ->rule('regex:/^[\p{L}0-9\s\-]+$/u')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if (filled($state)) {
                                                    $set('tag', [$state]);
                                                    $set('slug', Str::slug($state));
                                                } else {
                                                    $set('tag', []);
                                                    $set('slug', '');
                                                }
                                            })
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập tên sản phẩm.',
                                                'regex' => 'Tên sản phẩm chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                                'unique' => 'Tên sản phẩm đã tồn tại.'
                                            ]),

                                        TextInput::make('slug')
                                            ->label('Đường dẫn')
                                            ->disabled()
                                            ->dehydrated()
                                            ->rule('regex:/^[a-z0-9\-]+$/')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập đường dẫn.',
                                                'regex' => 'Đường dẫn chỉ được chứa chữ cái, số và dấu gạch.'
                                            ]),

                                    ])
                                    ->collapsible(),

                                Section::make('Mô tả sản phẩm')
                                    ->schema([
                                        RichEditor::make('description')
                                            ->label(false)
                                            
                                            ->required()
                                            ->minLength(20)
                                            ->maxLength(1000)
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập mô tả sản phẩm.',
                                                'min' => 'Mô tả phải có ít nhất :min ký tự.',
                                                'max' => 'Mô tả không được vượt quá :max ký tự.',
                                            ]),
                                    ])
                                    ->collapsible(),

                                Tabs::make('Tabs')
                                    ->tabs([
                                        Tabs\Tab::make('Thông tin sản phẩm')
                                            ->schema([
                                                Group::make([
                                                    TextInput::make('author')
                                                        ->label('Tác giả')
                                                        ->required()
                                                        ->maxLength(255)
                                                        ->rule('regex:/^[\p{L}0-9\s\-]+$/u')
                                                        ->validationMessages([
                                                            'required' => 'Vui lòng nhập tên tác giả.',
                                                            'regex' => 'Tên biến thể chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                                        ]),
                                                    TextInput::make('publish_year')->label('Năm xuất bản')->numeric()
                                                        ->rules([
                                                            'integer',
                                                            'max:' . now()->year,
                                                        ])
                                                        ->required()
                                                        ->validationMessages([
                                                            'required' => 'Vui lòng nhập năm xuất bản.',
                                                            'integer' => 'Năm xuất bản phải là số nguyên.',
                                                            'max' => 'Năm xuất bản không được lớn hơn năm hiện tại.',
                                                        ]),
                                                    Select::make('language')
                                                        ->label('Ngôn ngữ')
                                                        ->options(function () {
                                                            $data = json_decode(Storage::get('languages_full.json'), true);
                                                            return collect($data)->mapWithKeys(fn($lang) => [
                                                                $lang['native'] => $lang['native']
                                                            ])->sort();
                                                        })
                                                        ->required()
                                                        ->searchable()
                                                        ->validationMessages([
                                                            'required' => 'Vui lòng chọn ngôn ngữ.',
                                                        ]),
                                                ])->relationship('metadata'),
                                            ]),
                                        Tabs\Tab::make('Dữ liệu sản phẩm')
                                            ->schema([
                                                Select::make('type')
                                                    ->label('Loại sản phẩm')
                                                    ->options([
                                                        'simple' => 'Sản phẩm đơn giản',
                                                        'variable' => 'Sản phẩm có biến thể',
                                                    ])
                                                    ->required()
                                                    ->default('simple')
                                                    ->live(),

                                                Repeater::make('variants')
                                                    ->relationship('variants')
                                                    ->label(false)
                                                    ->schema([

                                                        Select::make('type')
                                                            ->label('Loại biến thể')
                                                            ->options([
                                                                'physical' => 'Sách giấy',
                                                                'ebook' => 'Ebook',
                                                            ])
                                                            ->live()
                                                            ->required()
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng chọn loại biến thể.',
                                                            ])
                                                            ->visible(fn($get) => $get('../../type') === 'variable'),

                                                        TextInput::make('name')
                                                            ->label('Tên biến thể')
                                                            ->required()
                                                            ->rule('regex:/^[\p{L}0-9\s\-]+$/u')
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng nhập tên biến thể.',
                                                                'regex' => 'Tên biến thể chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                                            ])
                                                            ->visible(fn($get) => $get('../../type') === 'variable'),

                                                        TextInput::make('code')
                                                            ->label('Mã sản phẩm')
                                                            ->default(fn() => StringHelper::generateSku('SP'))
                                                            ->required()
                                                            ->maxLength(30)
                                                            ->unique(ignoreRecord: true)
                                                            ->rule('regex:/^[a-zA-Z0-9\-]+$/')
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng nhập mã sản phẩm.',
                                                                'unique' => 'Mã sản phẩm đã tồn tại.',
                                                                'regex' => 'Mã sản phẩm chỉ được chứa chữ cái và số, không dấu, không ký tự đặc biệt.',
                                                            ]),

                                                        TextInput::make('price')
                                                            ->label('Giá')
                                                            ->numeric()
                                                            ->required()
                                                            ->prefix('VND')
                                                            ->rules(['integer', 'min:1'])
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng nhập giá.',
                                                                'integer' => 'Giá phải là số nguyên.',
                                                                'min' => 'Giá phải lớn hơn 0.',
                                                            ]),

                                                        TextInput::make('stock')
                                                            ->label('Tồn kho')
                                                            ->numeric()
                                                            ->required()
                                                            ->rules(['integer', 'min:1'])
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng nhập tồn kho.',
                                                                'integer' => 'Tồn kho phải là số nguyên.',
                                                                'min' => 'Tồn kho phải lớn hơn 0.',
                                                            ])
                                                            ->default(fn($get) => $get('type') === 'ebook' ? 0 : null)
                                                            ->hidden(fn($get) => $get('type') === 'ebook'),

                                                        FileUpload::make('image')
                                                            ->label('Ảnh sản phẩm')
                                                            ->directory('product_images')
                                                            ->image()
                                                            ->preserveFilenames()
                                                            ->getUploadedFileNameForStorageUsing(fn($file) => now()->format('YmdHis') . '.' . $file->getClientOriginalExtension())
                                                            ->visible(fn($get) => $get('type') === 'physical')
                                                            ->required(fn($get) => $get('type') === 'physical')
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng tải ảnh cho sản phẩm sách giấy.',
                                                            ]),

                                                        FileUpload::make('pdf')
                                                            ->label('Tệp PDF')
                                                            ->directory('ebooks')
                                                            ->acceptedFileTypes(['application/pdf'])
                                                            ->preserveFilenames()
                                                            ->getUploadedFileNameForStorageUsing(fn($file) => now()->format('YmdHis') . '.' . $file->getClientOriginalExtension())
                                                            ->visible(fn($get) => $get('type') === 'ebook')
                                                            ->required(fn($get) => $get('type') === 'ebook')
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng tải file PDF cho sản phẩm ebook.',
                                                            ]),

                                                        DateTimePicker::make('release_date')
                                                            ->label('Thời gian xuất bản')
                                                            ->default(now())
                                                            ->visible(fn($get) => $get('../../type') === 'variable')
                                                            ->required(fn($get) => $get('../../type') === 'variable')
                                                            ->validationMessages([
                                                                'required' => 'Vui lòng chọn thời gian xuất bản.',
                                                            ])->dehydrated(),

                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(fn($get) => $get('type') === 'simple' ? 1 : null)
                                                    ->addable(fn($get) => $get('type') === 'variable')
                                                    ->deletable(fn($get) => $get('type') === 'variable')
                                                    ->reorderable(fn($get) => $get('type') === 'variable')
                                                    ->collapsible(),
                                            ]),

                                    ])
                            ])

                            ->columnSpan(8),
                        Grid::make(1)
                            ->schema([
                                Section::make('Ảnh sản phẩm')
                                    ->schema([
                                        FileUpload::make('images')
                                            ->label(false)
                                            ->image()
                                            ->multiple()
                                            ->disk('public')
                                            ->directory('product_images')
                                            ->panelLayout('grid')
                                            ->preserveFilenames()
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng tải ảnh cho sản phẩm.',
                                            ])
                                            ->getUploadedFileNameForStorageUsing(fn($file) => now()->format('YmdHis') . '.' . $file->getClientOriginalExtension())
                                            ->afterStateHydrated(function ($state, $record, $set) {
                                                if (! $record) return;
                                                // $record->images là collection của ImageProductVariants
                                                $paths = $record->images
                                                    ->pluck('path')
                                                    ->map(fn($p) => "product_images/{$p}")
                                                    ->toArray();
                                                $set('images', $paths);
                                            })
                                            ->saveRelationshipsUsing(function ($state, $record) {
                                                // Xóa cũ, tạo mới
                                                $record->images()->delete();
                                                foreach ($state as $fullPath) {
                                                    $record->images()->create([
                                                        'path' => basename($fullPath),
                                                    ]);
                                                }
                                            })
                                            
                                    ])->collapsible(),

                                Section::make('Danh mục')
                                    ->schema([
                                        select::make('categories')
                                            ->label(false)
                                            ->reactive()
                                            ->multiple()
                                            ->relationship('categories', 'name', function ($query) {
                                                $query->whereNotIn('categories.row_id', [1]);
                                            })
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng chọn danh mục cho sản phẩm.',
                                            ]),
                                        View::make('components.create-category-inline')
                                            ->columns(1),
                                    ])->collapsible(),
                                Section::make('Nhà xuất bản')
                                    ->schema([
                                        Select::make('publisher_id')
                                            ->label(false)
                                            ->relationship('publisher', 'name')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng chọn nhà xuất bản.',
                                            ])
                                            ->searchable()
                                            ->preload(),
                                        View::make('components.create-publisher-inline')
                                    ])->collapsible(),
                                Section::make('Từ khóa')
                                    ->schema([
                                        TagsInput::make('tag')
                                            ->label(false)
                                            ->reorderable()
                                            ->separator(',')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập từ khóa.',
                                            ]),

                                    ])->collapsible(),
                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('is_active')->label('Trạng thái')->default(true)->dehydrated(),
                                        DateTimePicker::make('release_date')
                                            ->label('Thời gian phát hành')
                                            ->default(now())
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng chọn thời gian xuất bản.',
                                            ])
                                            ->dehydrated(),

                                    ])->collapsible(),
                            ])
                            ->columnSpan(4),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Tên')->searchable(),
                ImageColumn::make('images')
                    ->label('Ảnh')
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        $firstImage = optional($record->images->first())->path;
                        return $firstImage ? 'product_images/' . $firstImage : null;
                    })
                    ->height(100)
                    ->square(),

                TextColumn::make('categories')
                    ->label('Danh mục')
                    ->formatStateUsing(function ($record) {
                        return $record->categories->pluck('name')->join(', ');
                    }),
                TextColumn::make('publisher.name')->label('Nhà xuất bản'),
                TextColumn::make('variants.price')->label('Giá bán')->money('VND')->sortable(),
                TextColumn::make('variants.stock')->label('Tồn kho')->sortable(),
                TextColumn::make('release_date')
                    ->label('Ngày phát hành')
                    ->formatStateUsing(function ($state, $record) {
                        $variantDate = optional($record->variants->first())->release_date;

                        return $variantDate
                            ? '📘 ' . \Carbon\Carbon::parse($variantDate)->format('d/m/Y')
                            : ($record->release_date
                                ? '🗂️ ' . \Carbon\Carbon::parse($record->release_date)->format('d/m/Y')
                                : '—');
                    }),
                IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean(),
            ])
            ->filters([
                AdvancedFilter::make([
                    'label' => 'Lọc nâng cao',
                    'fields' => [
                        ['field' => 'price', 'label' => 'Giá bán', 'relation' => 'variants'],
                        ['field' => 'stock', 'label' => 'Tồn kho', 'relation' => 'variants'],
                        ['field' => 'release_date', 'label' => 'Ngày phát hành'],
                    ],
                    'filters' => ['status', 'category', 'author'],
                    'category_model' => \App\Models\Category::class,
                ])
            ])
            
            ->actions([
                ActionGroup::make([
                    EditAction::make()->recordTitleAttribute('name'),
                    ViewAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
