<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatResource\Pages;
use App\Models\Chat;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function getNavigationLabel(): string
    {
        return __('navigation.chats');
    }

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
                TextColumn::make('phone_number')->label('Phone Number')->searchable(),
                TextColumn::make('lang')->sortable()->badge(),
                TextColumn::make('type')->label('Type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'private' => 'primary',
                        'group' => 'secondary',
                        'supergroup' => 'success',
                        'channel' => 'warning',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->searchable(),
                TextColumn::make('role')
                    ->sortable()
                    ->badge()->color(fn(string $state): string => match ($state) {
                        'user' => 'primary',
                        'admin' => 'danger',
                    })
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
                Action::make('ban')
                    ->label(fn(Chat $chat): string => $chat->banned ? 'Blocked' : 'Allowed')
                    ->icon(fn(Chat $chat): string => $chat->banned ? 'heroicon-o-exclamation-triangle' : 'heroicon-o-check')
                    ->color(fn(Chat $chat): string => $chat->banned ? 'danger' : 'primary')
                    ->requiresConfirmation()
                    ->action(function (array $data, Chat $chat): void {
                        $chat->banned = !$chat->banned;
                        $chat->save();
                    }),
                Action::make('updateAuthor')
                    ->form([
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->required(),
                    ])
                    ->action(function (array $data): void {
                        // ...
                    })
                    ->infolist([
                        TextEntry::make('firs_name')

                    ])
                    ->slideOver()
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
