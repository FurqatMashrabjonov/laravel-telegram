<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Models\Photo;
use App\Telegram\Services\HtmlHelper;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class PhotoResource extends Resource
{
    protected static ?string $model = Photo::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getNavigationLabel(): string
    {
        return __('navigation.photos');
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
            ->headerActions([
                Action::make(__('button.how_to_use'))
                    ->icon('heroicon-o-information-circle')
                    ->color('info')
                    ->modalContent(new HtmlString(HtmlHelper::languageSelectionMode()))
            ])
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\ImageColumn::make('file_path')
                    ->width(200),
//                    ->height(150),
                TextColumn::make('file_name')->label(__(''))->sortable()->searchable(),
                TextColumn::make('file_size')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make(__('columns.download'))
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn(Photo $photo) => $photo->file_path)
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
            'index' => Pages\ListPhotos::route('/'),
            'create' => Pages\CreatePhoto::route('/create'),
            'edit' => Pages\EditPhoto::route('/{record}/edit'),
        ];
    }

}
