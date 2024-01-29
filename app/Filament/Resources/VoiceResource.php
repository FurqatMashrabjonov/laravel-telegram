<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoiceResource\Pages;
use App\Filament\Resources\VoiceResource\RelationManagers;
use App\Models\Voice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VoiceResource extends Resource
{
    protected static ?string $model = Voice::class;

    protected static ?string $navigationIcon = 'heroicon-o-speaker-wave';

    public static function getNavigationLabel(): string
    {
        return __('navigation.voices');
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
            'index' => Pages\ListVoices::route('/'),
            'create' => Pages\CreateVoice::route('/create'),
            'edit' => Pages\EditVoice::route('/{record}/edit'),
        ];
    }
}
