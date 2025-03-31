<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;
use App\Filament\Resources\BlogsResource\RelationManagers;
use App\Models\Blogs;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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
use Filament\Tables\Columns\ToggleColumn;
use function Laravel\Prompts\search;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\ImageColumn;


class BlogsResource extends Resource
{
    protected static ?string $model = Blogs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Hình ảnh')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->placeholder('Tên bài viết')
                            ->columnSpanFull()
                            ->label('Tên bài viết'),


                        RichEditor::make('content')
                            ->label('Nội dung')
                            ->columnSpanFull(),
                            DatePicker::make('published_at')
                            ->label('Ngày xuất bản')
                            ->displayFormat('d/m/Y'),


                        Toggle::make('status')
                            ->label('Trạng Thái')
                            ->default(1),
                        Toggle::make('slug')


                    ])
                    ->columnSpan(8),


                Fieldset::make('Hình ảnh')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->columnSpanFull()
                            ->image()
                    ])
                    ->columnSpan(4),
            ])->columns(12);
        //
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Tên bài viết')
                    ->searchable(),
                ImageColumn::make('thumbnail'),
                TextColumn::make('Nội dung')
                    ->html(),
                ToggleColumn::make('status'),

                TextColumn::make('published_at')
                    ->label('Ngày xuất bản')
                    ->dateTime('d/m/Y'),
                


            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        '0' => 'Ẩn ',
                        '1' => 'Hiện',
                    ])
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }
}
