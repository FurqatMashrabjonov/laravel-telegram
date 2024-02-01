<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatResource\Pages;
use App\Models\Chat;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
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
                TextColumn::make('chat_id')->label(__('columns.chat_id'))->searchable(),
                TextColumn::make('first_name')->label(__('columns.first_name'))->searchable(),
                TextColumn::make('last_name')->label(__('columns.last_name'))->searchable(),
                TextColumn::make('username')->label(__('columns.username'))->searchable(),
                TextColumn::make('phone_number')->label(__('columns.phone_number'))->searchable(),
                TextColumn::make('lang')->label(__('columns.lang'))->sortable()->badge(),
                TextColumn::make('type')->label(__('columns.type'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'private' => 'primary',
                        'group' => 'secondary',
                        'supergroup' => 'success',
                        'channel' => 'warning',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('columns.created_at'))
                    ->searchable(),
                TextColumn::make('role')
                    ->sortable()
                    ->label(__('columns.role'))
                    ->badge()->color(fn (string $state): string => match ($state) {
                        'user' => 'primary',
                        'admin' => 'danger',
                    }),
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
                Tables\Actions\ActionGroup::make([
                    Action::make('ban')
                        ->label(fn (Chat $chat): string => $chat->banned ? __('columns.unban') : __('columns.ban'))
                        ->icon(fn (Chat $chat): string => $chat->banned ? 'heroicon-o-check' : 'heroicon-o-exclamation-triangle')
                        ->color(fn (Chat $chat): string => $chat->banned ? 'primary' : 'danger')
                        ->requiresConfirmation()
                        ->action(function (array $data, Chat $chat): void {
                            $chat->banned = ! $chat->banned;
                            $chat->save();
                        }),
                ]),
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
