<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TextResource\Pages;
use App\Models\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TextResource extends Resource
{
    protected static ?string $model = Text::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationLabel(): string
    {
        return __('navigation.texts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(__('columns.key'))
                    ->autofocus()
                    ->required(),
                Forms\Components\Textarea::make('text.uz')
                    ->required()
                    ->label(__('columns.text_uz'))
                    ->placeholder('uz'),
                Forms\Components\Textarea::make('text.ru')
                    ->required()
                    ->label(__('columns.text_ru'))
                    ->placeholder('ru'),
                Forms\Components\Textarea::make('text.en')
                    ->required()
                    ->label(__('columns.text_en'))
                    ->placeholder('en'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),
                TextColumn::make('text.uz')
                    ->searchable()
                    ->label(__('columns.text_uz'))
                    ->limit(50),
                TextColumn::make('text.ru')
                    ->searchable()
                    ->label(__('columns.text_ru'))
                    ->limit(50),
                TextColumn::make('text.en')
                    ->searchable()
                    ->label(__('columns.text_en'))
                    ->limit(50),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListTexts::route('/'),
            'create' => Pages\CreateText::route('/create'),
            'edit' => Pages\EditText::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
