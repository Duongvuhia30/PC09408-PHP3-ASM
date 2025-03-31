<?php

namespace App\Filament\Resources\PublishersResource\Pages;

use App\Filament\Resources\PublishersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublishers extends EditRecord
{
    protected static string $resource = PublishersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
