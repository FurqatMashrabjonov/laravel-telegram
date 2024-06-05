<?php

namespace App\Filament\Resources;

use App\Models\Chat;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ChatResource\Pages;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

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
        return trans('admin.telegram.chats');
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
                TextColumn::make('chat_id')
                    ->label(trans('admin.telegram.chat_id'))
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('type')
                    ->label(trans('admin.telegram.type'))
                    ->badge()
                    ->color('primary'),
                TextColumn::make('username')
                    ->label('admin.telegram.username')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone_number')
                    ->label('admin.telegram.phone_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('first_name')
                    ->label('admin.telegram.first_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name')
                    ->label('admin.telegram.last_name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label(trans('admin.filters.created_from')),
                        DatePicker::make('created_until')->label(trans('admin.filters.created_until')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),

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
            'index'  => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit'   => Pages\EditChat::route('/{record}/edit'),
        ];
    }
}
