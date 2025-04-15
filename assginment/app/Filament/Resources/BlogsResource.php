<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TagsInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Textarea;;
use Filament\Tables\Columns\IconColumn;
use App\Filament\Filters\AdvancedFilter;



class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'bài viết';

    protected static ?string $navigationGroup = 'bài viết';

    protected static ?string $navigationLabel = 'Tất cả bài viết';

    protected static ?string $pluralModelLabel = 'Tạo mới bài viết';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Section::make('Tên bài viết')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Tên bài viết')
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
                                                'required' => 'Vui lòng nhập tên bài viết.',
                                                'regex' => 'Tên bài viết chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                                'unique' => 'Tên bài viết đã tồn tại.'
                                            ]),

                                        TextInput::make('slug')
                                            ->label('Đường dẫn')
                                            ->disabled()
                                            ->dehydrated()
                                            ->rule('regex:/^[a-z0-9\-]+$/'),

                                    ])
                                    ->collapsible(),

                                Section::make('Nội dung bài viết')
                                    ->schema([
                                        RichEditor::make('content')
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
                                Section::make('Mô tả ngắn')
                                    ->schema([
                                        Textarea::make('describe')
                                            ->label(false)
                                            ->rows(5)
                                            ->cols(20)
                                    ])->collapsible(),
                                Section::make('Tác giả')
                                    ->schema([
                                        TextInput::make('author')
                                            ->label(false)

                                    ])->collapsible(),
                            ])

                            ->columnSpan(8),
                        Grid::make(1)
                            ->schema([
                                Section::make('Ảnh đại diện')
                                    ->schema([
                                        FileUpload::make('thumbnail')
                                            ->label(false)
                                            ->image()
                                            ->disk('public')
                                            ->directory('blog_images')
                                            ->panelLayout('grid')
                                            ->preserveFilenames()
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Vui lòng tải ảnh cho bài viết.',
                                            ])

                                    ])->collapsible(),

                                Section::make('Danh mục')
                                    ->schema([
                                        select::make('category')
                                            ->label(false)
                                            ->reactive()
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload(),
                                        View::make('components.create-category-blog-inline')
                                            ->columns(1),
                                    ])->collapsible(),
                                Section::make('Từ khóa')
                                    ->schema([
                                        TagsInput::make('tag')
                                            ->label(false)
                                            ->reorderable()
                                            ->separator(','),
                                    ])->collapsible(),
                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('is_active')->label('Trạng thái')->default(true),
                                        DateTimePicker::make('published_at')
                                            ->label('Thời gian phát hành')
                                            ->default(now())
                                            ->validationMessages([
                                                'required' => 'Vui lòng chọn thời gian xuất bản.',
                                            ]),

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
                TextColumn::make('title')
                    ->label('Tên bài viết')
                    ->searchable(),
                ImageColumn::make('thumbnail')
                    ->label('Ảnh đại diện'),
                TextColumn::make('published_at')
                    ->label('Ngày xuất bản')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Danh mục'),
                TextColumn::make('author')
                    ->label('Tác giả'),
                IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean(),

            ])
            ->filters([
                AdvancedFilter::make([
                    'label' => 'Lọc nâng cao',
                    'fields' => [
                        ['field' => 'release_date', 'label' => 'Ngày phát hành'],
                    ],
                    'filters' => ['status', 'category', 'author'],
                    'category_model' => \App\Models\CategoryBlog::class,
                    'author_model' => \App\Models\Blog::class
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }
}
