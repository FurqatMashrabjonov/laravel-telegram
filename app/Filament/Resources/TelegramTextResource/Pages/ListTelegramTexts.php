<?php

namespace App\Filament\Resources\TelegramTextResource\Pages;

use App\Filament\Resources\TelegramTextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTelegramTexts extends ListRecords
{
    protected static string $resource = TelegramTextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
