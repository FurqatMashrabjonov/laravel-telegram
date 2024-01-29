<?php

namespace App\Livewire\Bot;

use Filament\Notifications\Notification;
use Livewire\Component;

class Control extends Component
{

    public bool $isRunning = false;

    public function mount()
    {
        $this->isRunning = settings('webhook_was_set');
    }

    public function start()
    {
        settings()->update(['webhook_was_set' => true]);
        $this->isRunning = true;

        $this->notify(__('settings.bot_started'));
    }

    public function stop(): void
    {
        settings()->update(['webhook_was_set' => false]);
        $this->isRunning = false;
        $this->notify(__('settings.bot_stopped'));
    }

    public function restart(): void
    {
        settings()->update(['webhook_was_set' => false]);
        $this->isRunning = false;
        settings()->update(['webhook_was_set' => true]);
        $this->isRunning = true;
        $this->notify(__('settings.bot_restarted'));
    }

    public function notify(string $message)
    {
        Notification::make()
            ->title($message)
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.bot.control');
    }
}
