<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Program;
use Filament\Forms\Form;
use App\Enums\ProgramType;
use App\Enums\ProgramCategory;
use App\Enums\LanguageLevel;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\ProgramResource\Pages;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Программы'; 
    protected static ?string $pluralModelLabel = 'Программы'; 
    protected static ?string $navigationLabel = 'Программы';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make([
                Forms\Components\Tabs::make('Content')->tabs([
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        Forms\Components\TextInput::make('title.ru')->label('Заголовок (RU)')->required(),
                        Forms\Components\Textarea::make('description.ru')->label('Описание (RU)'),
                        Forms\Components\Textarea::make('requirements.ru')->label('Требования (RU)'),
                        Forms\Components\Textarea::make('additional_info.ru')->label('Доп. информация (RU)'),
                        Forms\Components\TextInput::make('location.ru')->label('Локация (RU)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        Forms\Components\TextInput::make('title.en')->label('Title (EN)'),
                        Forms\Components\Textarea::make('description.en')->label('Description (EN)'),
                        Forms\Components\Textarea::make('requirements.en')->label('Requirements (EN)'),
                        Forms\Components\Textarea::make('additional_info.en')->label('Additional Info (EN)'),
                        Forms\Components\TextInput::make('location.en')->label('Location (EN)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('DE')->schema([
                        Forms\Components\TextInput::make('title.de')->label('Titel (DE)'),
                        Forms\Components\Textarea::make('description.de')->label('Beschreibung (DE)'),
                        Forms\Components\Textarea::make('requirements.de')->label('Anforderungen (DE)'),
                        Forms\Components\Textarea::make('additional_info.de')->label('Zusätzliche Info (DE)'),
                        Forms\Components\TextInput::make('location.de')->label('Ort (DE)'),
                    ]),
                ]),
            ])->columnSpanFull(),

            Forms\Components\Select::make('type')
                ->label('Тип программы')
                ->options(ProgramType::options())
                ->required(),

            Forms\Components\Select::make('category')
                ->label('Категория')
                ->options(ProgramCategory::options())
                ->required(),

            Forms\Components\Select::make('language_level')
                ->label('Уровень языка')
                ->options(LanguageLevel::options())
                ->required(),

            Forms\Components\FileUpload::make('image')->image()->label('Изображение'),

            Forms\Components\TextInput::make('duration')->label('Длительность'),
            Forms\Components\TextInput::make('salary_min')->numeric()->label('Зарплата от'),
            Forms\Components\TextInput::make('salary_max')->numeric()->label('Зарплата до'),
            Forms\Components\TextInput::make('currency')->default('EUR')->label('Валюта')->required(),
            Forms\Components\TextInput::make('min_age')->numeric()->label('Мин. возраст'),
            Forms\Components\TextInput::make('max_age')->numeric()->label('Макс. возраст'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return $state['ru'] ?? $state['en'] ?? $state['de'] ?? 'Без названия';
                        }
                        return $state;
                    }),

            Tables\Columns\TextColumn::make('type')->label('Тип')->sortable()
                ->formatStateUsing(fn($state) => $state?->label() ?? '-'),

            Tables\Columns\TextColumn::make('category')->label('Категория')
                ->formatStateUsing(fn($state) => $state?->label() ?? '-'),

            Tables\Columns\TextColumn::make('language_level')->label('Язык')
                ->formatStateUsing(fn($state) => LanguageLevel::tryFrom($state)?->label() ?? '-'),

            Tables\Columns\TextColumn::make('salary_min')->label('Мин.'),
            Tables\Columns\TextColumn::make('salary_max')->label('Макс.'),
            Tables\Columns\TextColumn::make('currency')->label('Валюта'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('type')->options(ProgramType::options())->label('Тип'),
            Tables\Filters\SelectFilter::make('category')->options(ProgramCategory::options())->label('Категория'),
            Tables\Filters\SelectFilter::make('language_level')->options(LanguageLevel::options())->label('Язык'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
