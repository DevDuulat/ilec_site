<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Партнёр';
    protected static ?string $pluralModelLabel = 'Партнёры';
    protected static ?string $navigationLabel = 'Партнёры';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Языковые версии')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Русский')
                        ->schema([
                            Forms\Components\TextInput::make('title.ru')
                                ->label('Название (RU)*')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('country.ru')
                                ->label('Страна (RU)*')
                                ->required()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Tabs\Tab::make('Английский')
                        ->schema([
                            Forms\Components\TextInput::make('title.en')
                                ->label('Название (EN)')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('country.en')
                                ->label('Страна (EN)')
                                ->maxLength(255),
                        ]),
                    Forms\Components\Tabs\Tab::make('Немецкий')
                        ->schema([
                            Forms\Components\TextInput::make('title.de')
                                ->label('Название (DE)')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('country.de')
                                ->label('Страна (DE)')
                                ->maxLength(255),
                        ]),
                ])
                ->persistTabInQueryString()
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('image')
                ->label('Логотип')
                ->image()
                ->directory('partners')
                ->preserveFilenames(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return $state['ru'] ?? $state['en'] ?? $state['de'] ?? 'Без названия';
                        }
                        return $state;
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('title->ru', 'like', "%{$search}%")
                            ->orWhere('title->en', 'like', "%{$search}%")
                            ->orWhere('title->de', 'like', "%{$search}%");
                    }),

                Tables\Columns\TextColumn::make('country')
                    ->label('Страна')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return $state['ru'] ?? $state['en'] ?? $state['de'] ?? 'Без страны';
                        }
                        return $state;
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('country->ru', 'like', "%{$search}%")
                            ->orWhere('country->en', 'like', "%{$search}%")
                            ->orWhere('country->de', 'like', "%{$search}%");
                    }),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Лого')
                    ->circular(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
