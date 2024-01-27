<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Models\Settings;
use App\Telegram\Services\HtmlHelper;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('settings.telegram_bot_settings'))
                    ->description(new HtmlString(__('settings.telegram_bot_settings_description')))
                    ->aside()
                    ->schema([
                        TextInput::make('bot_token')
                            ->label(__('settings.bot_token'))
                            ->required()
                            ->helperText(new HtmlString('Enter the bot token you received from <a href="https://t.me/BotFather" class="inline-flex items-center rounded-md dark:bg-gray-200 bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10" target="_blank">@BotFather</a>')),
                        TextInput::make('webhook_url')
                            ->label(__('settings.webhook_url'))
                            ->required()
                            ->helperText('Enter the website url address. Example: https://example.uz. Domain must be https.'),
                        Toggle::make('webhook_was_set')
                            ->label(__('settings.run_telegram_bot'))
                            ->helperText('If you enable this option, the bot will start working. If you disable this option, the bot will stop working.'),

                    ]),
                Section::make(__('settings.language_selection_settings'))
                    ->description(__('settings.language_selection_settings_description'))
                    ->aside()
                    ->schema([
                        Toggle::make('enable_language_selection')
                            ->label(__('settings.enable_language_selection'))
                            ->live()
                            ->helperText('If you enable this option, the user will be asked to select a language when they first start the bot.'),
                        Select::make('language_selection_mode')
                            ->label(__('settings.language_selection_mode'))
                            ->options([
                                'inline' => 'Inline',
                                'markup' => 'Markup',
                            ])->maxWidth(MaxWidth::Medium)
                            ->native(false)
                            ->required()
//                            ->helperText('If you select the "Inline" option, the user will be asked to select a language in the same message. If you select the "Markup" option, the user will be asked to select a language in a separate message.'),
                            ->helperText(new HtmlString(HtmlHelper::languageSelectionMode()))
                    ]),
                Section::make('Phone Number')
                    ->description('This section is related to the phone number feature.')
                    ->aside()
                    ->schema([
                        Toggle::make('enable_phone_number')
                            ->label('Enable Phone Number')
                            ->helperText('If you enable this option, the user will be asked to send their phone number when they first start the bot.'),

                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('enable_language_selection')
                    ->label('Enable Language Selection')
                    ->alignCenter(),
                ToggleColumn::make('enable_phone_number')
                    ->label('Enable Phone Number')
                    ->alignCenter(),
                SelectColumn::make('language_selection_mode')
                    ->label('Language Selection Mode')
                    ->options([
                        'inline' => 'Inline',
                        'markup' => 'Markup',
                    ])
                    ->alignCenter()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
