<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatResource\Pages;
use App\Filament\Resources\ChatResource\RelationManagers;
use App\Models\Chat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chat_id')->label('Chat ID')->searchable(),
                TextColumn::make('first_name')->label('First Name')->searchable(),
                TextColumn::make('last_name')->label('Last Name')->searchable(),
                TextColumn::make('username')->label('Username')->searchable(),
                TextColumn::make('type')->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'private' => 'primary',
                        'group' => 'secondary',
                        'supergroup' => 'success',
                        'channel' => 'warning',
                    })
                    ->sortable(),

            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'private' => 'Private',
                        'group' => 'Group',
                        'supergroup' => 'Supergroup',
                        'channel' => 'Channel',
                    ]),
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
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
        ];
    }
}
