<div>
    <div class="flex gap-2">
        @if($isRunning)
            <button
                wire:click="stop"
                class="p-2 bg-red-500 rounded-full hover:bg-gray-100"
                x-tooltip="{
                        content: @js(__('settings.stop_bot')),
                        theme: $store.theme,
                        placement: 'left'
                    }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="0"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.25 7.5A2.25 2.25 0 0 1 7.5 5.25h9a2.25 2.25 0 0 1 2.25 2.25v9a2.25 2.25 0 0 1-2.25 2.25h-9a2.25 2.25 0 0 1-2.25-2.25v-9Z"/>
                </svg>
            </button>
        @else
            <button
                wire:click="start"
                class="p-2 bg-green-500 rounded-full hover:bg-gray-100"
                x-tooltip="{
                        content: @js(__('settings.start_bot')),
                        theme: $store.theme,
                        placement: 'left'
                    }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 24 24" stroke-width="0"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z"/>
                </svg>
            </button>
        @endif

        <button
            wire:click="restart"
            class="p-2 bg-red-500 rounded-full hover:bg-gray-100"
            x-tooltip="{
                        content: @js(__('settings.restart_bot')),
                        theme: $store.theme,
                        placement: 'left'
                    }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
            </svg>
        </button>
    </div>
</div>
