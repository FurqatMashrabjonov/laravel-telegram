<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TelegramTextResource\Pages;
use App\Models\TelegramText;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TelegramTextResource extends Resource
{
    protected static ?string $model = TelegramText::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function getNavigationGroup(): ?string
    {
        return trans('admin.telegram.telegram');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationLabel(): string
    {
        return trans('admin.telegram.telegram_text');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTelegramTexts::route('/'),
            'create' => Pages\CreateTelegramText::route('/create'),
            'edit' => Pages\EditTelegramText::route('/{record}/edit'),
        ];
    }
}
