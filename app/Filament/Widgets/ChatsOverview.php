<?php

namespace App\Filament\Widgets;

use App\Models\Chat;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ChatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $chats = Chat::count();

        return [
            Stat::make(trans('admin.telegram.chats'), $chats)->icon(icon('users')),
        ];
    }
}
