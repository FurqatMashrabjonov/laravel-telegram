<?php

namespace App\Filament\Resources\AudioResource\Pages;

use App\Filament\Resources\AudioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAudio extends ListRecords
{
    protected static string $resource = AudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
