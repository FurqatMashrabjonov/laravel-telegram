<?php

namespace App\Telegram\Services;

class HtmlHelper
{

    public static function languageSelectionMode(): string
    {
        return '
<div class="flex gap-1">
    <div class="rounded-lg border border-gray-200 p-5 shadow">
      <img src="/images/language-selection-mode/inline.png" class="mb-2 rounded-lg" alt="inline"/>
      <p class="mb-2 text-center font-bold tracking-tight text-gray-900">'. __('settings.inline_selection_mode') .'</p>
    </div>
    <div class="rounded-lg border border-gray-200 p-5 shadow">
      <img src="/images/language-selection-mode/markup.png" class="mb-2 rounded-lg" alt="inline"/>
      <p class="mb-2 text-center font-bold tracking-tight text-gray-900">'. __('settings.markup_selection_mode') .'</p>
</div>
</div>
';

    }
}
