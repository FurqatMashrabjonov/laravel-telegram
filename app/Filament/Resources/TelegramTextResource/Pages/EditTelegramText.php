<?php

namespace App\Filament\Resources\TelegramTextResource\Pages;

use App\Filament\Resources\TelegramTextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTelegramText extends EditRecord
{
    protected static string $resource = TelegramTextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
