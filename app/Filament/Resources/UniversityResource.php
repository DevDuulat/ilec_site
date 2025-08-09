<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversityResource\Pages;
use App\Models\University;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Русский')
                            ->schema([
                                Forms\Components\TextInput::make('name.ru')
                                    ->label('Название')
                                    ->required(),
                                Forms\Components\TextInput::make('country.ru')
                                    ->label('Страна'),
                                Forms\Components\Textarea::make('description.ru')
                                    ->label('Описание'),
                            ]),
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label('Name')
                                    ->required(),
                                Forms\Components\TextInput::make('country.en')
                                    ->label('Country'),
                                Forms\Components\Textarea::make('description.en')
                                    ->label('Description'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Deutsch')
                            ->schema([
                                Forms\Components\TextInput::make('name.de')
                                    ->label('Name')
                                    ->required(),
                                Forms\Components\TextInput::make('country.de')
                                    ->label('Land'),
                                Forms\Components\Textarea::make('description.de')
                                    ->label('Beschreibung'),
                            ]),
                    ]),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Изображение'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListUniversities::route('/'),
            'create' => Pages\CreateUniversity::route('/create'),
            'edit' => Pages\EditUniversity::route('/{record}/edit'),
        ];
    }
}
