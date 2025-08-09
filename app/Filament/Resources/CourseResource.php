<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Russian')
                            ->schema([
                                Forms\Components\TextInput::make('title.ru')
                                    ->label('Title (RU)')
                                    ->required(),
                                Forms\Components\TextInput::make('description.ru')
                                    ->label('Description (RU)'),
                                Forms\Components\TextInput::make('tags.ru')
                                    ->label('Tags (RU)'),
                                Forms\Components\TextInput::make('category.ru')
                                    ->label('Category (RU)')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                                Forms\Components\TextInput::make('description.en')
                                    ->label('Description (EN)'),
                                Forms\Components\TextInput::make('tags.en')
                                    ->label('Tags (EN)'),
                                Forms\Components\TextInput::make('category.en')
                                    ->label('Category (EN)')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('German')
                            ->schema([
                                Forms\Components\TextInput::make('title.de')
                                    ->label('Title (DE)'),
                                Forms\Components\TextInput::make('description.de')
                                    ->label('Description (DE)'),
                                Forms\Components\TextInput::make('tags.de')
                                    ->label('Tags (DE)'),
                                Forms\Components\TextInput::make('category.de')
                                    ->label('Category (DE)')
                                    ->maxLength(255),
                            ]),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('General')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                        Forms\Components\Toggle::make('is_popular')
                            ->label('Is Popular')
                            ->required(),
                        Forms\Components\TextInput::make('duration')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('group_size')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price_per_month')
                            ->numeric(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->formatStateUsing(fn ($state) => $state[app()->getLocale()] ?? $state['en'] ?? $state['ru'] ?? '')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('title->ru', 'like', "%{$search}%")
                            ->orWhere('title->en', 'like', "%{$search}%")
                            ->orWhere('title->de', 'like', "%{$search}%");
                    }),

                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->formatStateUsing(fn ($state) => $state[app()->getLocale()] ?? ''),

                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean(),

                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),

                Tables\Columns\TextColumn::make('group_size')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price_per_month')
                    ->numeric()
                    ->sortable(),

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
                Tables\Filters\SelectFilter::make('language')
                    ->options([
                        'ru' => 'Russian',
                        'en' => 'English',
                        'de' => 'German',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereNotNull('title->' . $data['value']);
                        }
                    }),
                Tables\Filters\Filter::make('is_popular')
                    ->query(fn (Builder $query): Builder => $query->where('is_popular', true))
                    ->label('Popular only'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
