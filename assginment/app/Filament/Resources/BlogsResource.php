<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;
use App\Filament\Resources\BlogsResource\RelationManagers;
use App\Models\Blog;
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
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Filters\Filter;

class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'bài viết';

    protected static ?string $navigationGroup = 'bài viết';

    protected static ?string $navigationLabel = 'Tất cả bài viết';

    protected static ?string $pluralModelLabel = 'bài viết';

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


                        MarkdownEditor::make('content')
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
                    ]),
                    Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DateTimePicker::make('created_form')
                        ->label('Tu ngay')
                        ->native('false'),

                        Forms\Components\DateTimePicker::make('created_until')
                        ->label('Den ngay')
                        ->native('false'),

                    ])
                    ->query( function (Builder $query,array $data): Builder{
                        return $query
                        ->when(
                            $data['created_form'],
                            fn(Builder $query,$date):Builder => $query->whereDate('created_at','>=',$date),

                        )
                        ->when(
                            $data['created_until'],
                            fn(Builder $query,$date):Builder => $query->whereDate('created_at','=<',$date),
                        );
                    }),

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
