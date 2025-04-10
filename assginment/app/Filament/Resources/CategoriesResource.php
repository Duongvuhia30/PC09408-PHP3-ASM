<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class CategoriesResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationGroup = 'Sản phẩm';

    protected static ?string $navigationLabel = 'Danh mục';

    protected static ?string $label = 'Danh Mục';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('row_id', '!=', Category::getDefaultCategoryId());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Tên danh mục')
                                            ->required()
                                            ->maxLength(225)
                                            ->live(onBlur: true)
                                            ->unique(ignoreRecord: true)
                                            ->rule('regex:/^[\p{L}0-9\s\-]+$/u')
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập tên danh mục.',
                                                'regex' => 'Tên danh mục chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                            ])
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if (filled($state)) {
                                                    $set('tag', [$state]);
                                                    $set('slug', Str::slug($state));
                                                } else {
                                                    $set('tag', []);
                                                    $set('slug', '');
                                                }
                                            }),

                                        TextInput::make('slug')
                                            ->label('Đường dẫn')
                                            ->disabled()
                                            ->dehydrated()
                                            ->rule('regex:/^[a-z0-9\-]+$/'),

                                        TagsInput::make('tag')
                                            ->label('Từ khóa')
                                            ->reorderable()
                                            ->separator(','),

                                        Select::make('parent_id')
                                            ->label('Danh mục cha')
                                            ->options(function ($record) {
                                                $query = Category::query()->where('row_id', '!=', 1);

                                                if ($record) {
                                                    $query->whereNot('row_id', $record->row_id);
                                                }

                                                return $query->pluck('name', 'row_id');
                                            })
                                            ->searchable(),
                                    ])
                                    ->columnSpan(6),

                                FileUpload::make('images')
                                    ->label('Ảnh đại diện')
                                    ->image()
                                    ->disk('public')
                                    ->directory('category_images')
                                    ->preserveFilenames(false)
                                    ->multiple()
                                    ->maxFiles(4)
                                    ->imageEditor()
                                    ->panelLayout('grid')
                                    ->getUploadedFileNameForStorageUsing(function ($file) {
                                        $timestamp = now()->format('YmdHis');
                                        $extension = $file->getClientOriginalExtension();
                                        return $timestamp . '.' . $extension;
                                    })
                                    ->afterStateHydrated(function ($state, $record, callable $set) {
                                        if ($record && $record->images) {
                                            $set('images', $record->images->pluck('path')->toArray());
                                        }
                                    })
                                    ->saveRelationshipsUsing(function ($state, $record) {
                                        if (!$record) return;

                                        $existingPaths = $record->images->pluck('path')->toArray();

                                        foreach ($state as $path) {
                                            $relativePath = str_replace(asset('storage/'), '', $path);
                                            if (!in_array($relativePath, $existingPaths)) {
                                                $record->images()->create([
                                                    'path' => $relativePath,
                                                ]);
                                            }
                                        }
                                    })
                                    ->columnSpan(6),

                            ]),

                        Toggle::make('is_active')
                            ->label('Trạng thái')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Tên danh mục')->searchable(),
                TextColumn::make('parent.name')->label('danh mục cha'),
                ImageColumn::make('images')
                    ->label('Ảnh')
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        return optional($record->images->first())->path;
                    })
                    ->height(100)
                    ->square(),
                IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean(),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    EditAction::make()->recordTitleAttribute('name'),
                    ViewAction::make(),
                    DeleteAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Xóa Danh Mục')
                        ->modalDescription(
                            fn($record) =>
                            $record->products()->exists()
                                ? '⚠️ Danh mục này đang chứa sản phẩm. Nếu bạn xác nhận xóa, các sản phẩm sẽ được chuyển sang danh mục mặc định.'
                                : 'Bạn có chắc chắn muốn xóa danh mục này?'
                        )
                        ->modalSubmitActionLabel('Xác nhận')   // ✅ thay cho modalButton()
                        ->modalCancelActionLabel('Hủy bỏ')     // ✅ thay cho modalCancelButton()
                        ->after(function ($record) {
                            if ($record->products()->exists()) {
                                $defaultId = \App\Models\Category::getDefaultCategoryId();

                                foreach ($record->products as $product) {
                                    $product->categories()->sync(
                                        $product->categories->pluck('row_id')->filter(fn($id) => $id != $record->row_id)->push($defaultId)
                                    );
                                }
                            }
                        }),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRecordRouteKeyName(): ?string
    {
        return 'slug';
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategories::route('/create'),
            'edit' => Pages\EditCategories::route('/{record}/edit'),
        ];
    }
}
