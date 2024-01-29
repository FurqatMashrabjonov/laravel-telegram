<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListPhotos extends ListRecords
{

//    use ExposesTableToWidgets;

    protected static string $resource = PhotoResource::class;

//    protected function getHeaderActions(): array
//    {
//        return [
////            Actions\CreateAction::make(),
//            Action::make(__('button.how_to_use'))
//                ->icon('heroicon-o-information-circle')
//                ->color('info')
//                ->modal
//        ];
//    }

//    public function getHeaderWidgets(): array
//    {
//        return [
//            PhotoResource\Widgets\PhotoDoc::make(),
//        ];
//    }
}
