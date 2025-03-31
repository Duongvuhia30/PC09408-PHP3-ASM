<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublishersResource\Pages;
use App\Filament\Resources\PublishersResource\RelationManagers;
use App\Models\Publishers;
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
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Str;
use Filament\Tables\Enums\FiltersLayout;


class PublishersResource extends Resource
{
    protected static ?string $model = Publishers::class;

    protected static ?string $navigationGroup = 'Sản phẩm';

    protected static ?string $navigationLabel = 'Nhà xuất bản';

    protected static ?string $label = 'Nhà xuất bản';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Tên nhà xuất bản')
                                    ->required()
                                    ->maxLength(225)
                                    ->live(onBlur: true)
                                    ->unique(table: 'publishers', column: 'name', ignoreRecord: true)
                                    ->regex('/^[\p{L}0-9\s\-]+$/u')
                                    ->afterStateUpdated(fn(callable $set, $state) => $set('slug', Str::slug($state)))
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập tên nhà xuất bản.',
                                        'regex' => 'Tên nhà xuất bản chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang.',
                                        'unique' => 'Tên nhà xuất bản đã tồn tại.',
                                    ]),

                                Hidden::make('slug'),

                                TextInput::make('phone')
                                    ->label('Số điện thoại')
                                    ->required()
                                    ->maxLength(10)
                                    ->unique(table: 'publishers', column: 'phone', ignoreRecord: true)
                                    ->regex('/^(0|\+84)(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-5]|9[0-9])[0-9]{7}$/')
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập số điện thoại.',
                                        'regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng Việt Nam.',
                                        'unique' => 'Số điện thoại này đã được sử dụng.',
                                    ]),

                                TextInput::make('address')
                                    ->label('Địa chỉ')
                                    ->required()
                                    ->maxLength(225)
                                    ->regex('/^[a-zA-Z0-9À-ỹà-ỹ\s,.\-\/]+$/u')
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập địa chỉ.',
                                        'regex' => 'Địa chỉ không hợp lệ. Vui lòng chỉ dùng chữ, số và các ký tự phổ biến như dấu phẩy, chấm, gạch.',
                                    ]),

                                TextInput::make('contact_email')
                                    ->label('Email')
                                    ->required()
                                    ->maxLength(225)
                                    ->unique(table: 'publishers', column: 'contact_email', ignoreRecord: true)
                                    ->email()
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập email.',
                                        'email' => 'Email không hợp lệ. Vui lòng nhập đúng định dạng.',
                                        'unique' => 'Email này đã được sử dụng.',
                                    ]),

                            ])->columns(2),
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
                TextColumn::make('name')->label('Tên nhà xuất bản')->searchable(),
                TextColumn::make('phone')->label('Số điện thoại'),
                TextColumn::make('address')->label('Địa chỉ'),
                TextColumn::make('contact_email')->label('Email'),
                IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean(),
            ])
            ->filters([
                // ...
            ], layout: FiltersLayout::BelowContent)
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
            'index' => Pages\ListPublishers::route('/'),
            'create' => Pages\CreatePublishers::route('/create'),
            'edit' => Pages\EditPublishers::route('/{record}/edit'),
        ];
    }
}
