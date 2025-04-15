<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesBlogResource\Pages;
use App\Filament\Resources\CategoriesBlogResource\RelationManagers;
use App\Models\CategoriesBlog;
use App\Models\CategoryBlog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Filters\AdvancedFilter;


class CategoriesBlogResource extends Resource
{
    protected static ?string $model = CategoryBlog::class;

    protected static ?string $navigationGroup = 'bài viết';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'danh mục bài viết';

    protected static ?string $navigationLabel = 'Danh mục bài viết';

    protected static ?string $pluralModelLabel = 'Danh mục bài viết';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount('blog');
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
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->unique(ignoreRecord: true)
                                            ->rule('regex:/^(?=.*\p{L})[\p{L}0-9\s\-]+$/u')
                                            ->validationMessages([
                                                'required' => 'Vui lòng nhập tên danh mục bài viết.',
                                                'regex' => 'Tên danh mục chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                            ])
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if (filled($state)) {
                                                    $set('slug', Str::slug($state));
                                                } else {
                                                    $set('slug', '');
                                                }
                                            }),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true)
                                            ->disabled()
                                            ->dehydrated(),
                                        // ->rule('regex:/^[a-z0-9\-]+$/'),

                                        Toggle::make('is_active')
                                            ->label('Trạng thái')
                                            ->default(true)
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->inline()
                                            ->afterStateUpdated(function ($state, $record) {
                                                $record->save(); 
                                            }),
                                    ]),

                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên danh mục bài viết')
                    ->searchable(),
                TextColumn::make('blog_count')
                    ->label('Số bài viết')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean(),

            ])
            ->filters([
                AdvancedFilter::make([
                    'label' => 'Lọc nâng cao',
                    'filters' => ['status'],
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
            'index' => Pages\ListCategoriesBlogs::route('/'),
            'create' => Pages\CreateCategoriesBlog::route('/create'),
            'edit' => Pages\EditCategoriesBlog::route('/{record}/edit'),
        ];
    }
}
