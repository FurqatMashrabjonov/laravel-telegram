<?php

namespace App\Filament\Widgets;

use App\Models\Chat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ChatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('widgets.chats'), Chat::query()->count()),
        ];
    }
}
