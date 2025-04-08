<?php

namespace App\Filament\Resources\CategoriesBlogResource\Pages;

use App\Filament\Resources\CategoriesBlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoriesBlog extends EditRecord
{
    protected static string $resource = CategoriesBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
