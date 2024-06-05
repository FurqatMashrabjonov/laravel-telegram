<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Settings;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\SettingsResource\Pages;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function getNavigationGroup(): ?string
    {
        return trans('admin.app.app_settings');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationLabel(): string
    {
        return trans('admin.app.settings');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')
                    ->label('admin.settings.key')
                    ->required()
                    ->disabled(),
                TextInput::make('value')
                    ->label('admin.settings.value')
                    ->required(),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('admin.settings.key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('admin.settings.value')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
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
            'index'  => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit'   => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}
