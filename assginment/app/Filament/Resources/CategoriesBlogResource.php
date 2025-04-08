<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesBlogResource\Pages;
use App\Filament\Resources\CategoriesBlogResource\RelationManagers;
use App\Models\CategoriesBlog;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;

class CategoriesBlogResource extends Resource
{
    protected static ?string $model = CategoriesBlog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                            ->rule('regex:/^[\p{L}0-9\s\-]+$/u')
                            ->validationMessages([
                                'required' => 'Vui lòng nhập tên danh mục.',
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
                            ->disabled(), // Tự sinh nên disable người dùng chỉnh
                    ]),
                    FileUpload::make('thumbnail')
                    ->image()
                    ->label('Ảnh danh mục')
                    ->directory('uploads/categories') // thư mục lưu trong storage/app/public/uploads/categories
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
                
            ]),
        ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Tên bài viết')
                ->searchable(),
            ImageColumn::make('thumbnail'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
