<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestFormResource\Pages;
use App\Filament\Resources\RequestFormResource\RelationManagers;
use App\Models\RequestForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class RequestFormResource extends Resource
{
    protected static ?string $model = RequestForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Заявки'; 
    protected static ?string $pluralModelLabel = 'Заявки'; 
    protected static ?string $navigationLabel = 'Заявки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Имя')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Телефон')
                    ->tel()
                    ->maxLength(20),
                Forms\Components\Textarea::make('message')
                    ->label('Сообщение')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('source')
                    ->label('Источник')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),
                Tables\Columns\TextColumn::make('source')
                    ->label('Источник')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Фильтры можно добавить позже
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\ViewAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Удалить выбранное'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListRequestForms::route('/'),
            'create' => Pages\CreateRequestForm::route('/create'),
            'edit' => Pages\EditRequestForm::route('/{record}/edit'),
        ];
    }
}
