<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AudioResource\Pages;
use App\Filament\Resources\AudioResource\RelationManagers;
use App\Models\Audio;
use App\Models\Photo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AudioResource extends Resource
{
    protected static ?string $model = Audio::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    public static function getNavigationLabel(): string
    {
        return __('navigation.audios');
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
                TextColumn::make('id')->label('ID')->sortable()->searchable(),
                TextColumn::make('title')->label('Title')->sortable()->searchable(),
                TextColumn::make('performer')->label('Performer')->sortable()->searchable(),
                TextColumn::make('file_name')->label('File Name')->sortable()->searchable(),
                TextColumn::make('mime_type')->label('Mime Type')->sortable()->searchable(),
                TextColumn::make('file_size')->label('File Size')->sortable()->searchable(),
                TextColumn::make('duration')->label('Duration')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Created At')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
                Action::make(__('columns.download'))
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn(Audio $audio) => $audio->file_path)
            ])->bulkActions([
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
            'index' => Pages\ListAudio::route('/'),
            'create' => Pages\CreateAudio::route('/create'),
            'edit' => Pages\EditAudio::route('/{record}/edit'),
        ];
    }
}
