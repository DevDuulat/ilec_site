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
    protected static ?string $modelLabel = 'Курс';
    protected static ?string $pluralModelLabel = 'Курсы';
    protected static ?string $navigationLabel = 'Курсы';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Переводы')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Русский')
                            ->schema([
                                Forms\Components\TextInput::make('title.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                                Forms\Components\TextInput::make('description.ru')
                                    ->label('Описание (RU)'),
                                Forms\Components\TextInput::make('tags.ru')
                                    ->label('Теги (RU)'),
                                Forms\Components\TextInput::make('category.ru')
                                    ->label('Категория (RU)')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('Английский')
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label('Название (EN)'),
                                Forms\Components\TextInput::make('description.en')
                                    ->label('Описание (EN)'),
                                Forms\Components\TextInput::make('tags.en')
                                    ->label('Теги (EN)'),
                                Forms\Components\TextInput::make('category.en')
                                    ->label('Категория (EN)')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('Немецкий')
                            ->schema([
                                Forms\Components\TextInput::make('title.de')
                                    ->label('Название (DE)'),
                                Forms\Components\TextInput::make('description.de')
                                    ->label('Описание (DE)'),
                                Forms\Components\TextInput::make('tags.de')
                                    ->label('Теги (DE)'),
                                Forms\Components\TextInput::make('category.de')
                                    ->label('Категория (DE)')
                                    ->maxLength(255),
                            ]),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Основное')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Изображение')
                            ->image(),
                        Forms\Components\Toggle::make('is_popular')
                            ->label('Популярный')
                            ->required(),
                        Forms\Components\TextInput::make('duration')
                            ->label('Длительность')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('group_size')
                            ->label('Размер группы')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price_per_month')
                            ->label('Цена за месяц')
                            ->numeric(),
                    ])
            ]);
    }

      public static function table(Table $table): Table
      {
          return $table
              ->columns([
                  Tables\Columns\TextColumn::make('title')
              ->label('Название')
              ->formatStateUsing(function ($state) {
                  // Если $state уже является строкой (локализованный вывод)
                  if (is_string($state)) {
                      return $state;
                  }
                  
                  // Если $state - это массив с переводами
                  if (is_array($state)) {
                      return $state['ru'] ?? $state['en'] ?? $state['de'] ?? 'Нет названия';
                  }
                  
                  return 'Нет названия';
              })
              ->searchable(query: function (Builder $query, string $search): Builder {
                  return $query
                      ->where('title->ru', 'like', "%{$search}%")
                      ->orWhere('title->en', 'like', "%{$search}%")
                      ->orWhere('title->de', 'like', "%{$search}%");
              })
              ->sortable()
              ->tooltip(function ($record) {
                  if (is_array($record->title)) {
                      return collect($record->title)
                          ->map(fn ($value, $key) => "$key: $value")
                          ->implode(PHP_EOL);
                  }
                  return $record->title;
              }),

                  Tables\Columns\TextColumn::make('category')
            ->label('Категория')
            ->formatStateUsing(function ($state) {
                // Если $state уже строка (например, если категория не локализована)
                if (is_string($state)) {
                    return $state;
                }
                
                // Если $state - массив с переводами
                if (is_array($state)) {
                    return $state['ru'] ?? $state['en'] ?? $state['de'] ?? '';
                }
                
                // Если $state - JSON строка
                if (is_string($state) && json_decode($state, true)) {
                    $localized = json_decode($state, true);
                    return $localized['ru'] ?? $localized['en'] ?? $localized['de'] ?? '';
                }
                
                return '';
            })
            ->searchable(query: function (Builder $query, string $search): Builder {
                return $query
                    ->where('category->ru', 'like', "%{$search}%")
                    ->orWhere('category->en', 'like', "%{$search}%")
                    ->orWhere('category->de', 'like', "%{$search}%");
            })
            ->tooltip(function ($record) {
                $category = $record->category;
                
                if (is_array($category)) {
                    return collect($category)
                        ->map(fn ($value, $key) => "$key: $value")
                        ->implode(PHP_EOL);
                }
                
                if (is_string($category) && json_decode($category, true)) {
                    return collect(json_decode($category, true))
                        ->map(fn ($value, $key) => "$key: $value")
                        ->implode(PHP_EOL);
                }
                
                return $category;
            }),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Изображение')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-course.png')),

                Tables\Columns\IconColumn::make('is_popular')
                    ->label('Популярный')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Длительность')
                    ->suffix(' ч.')
                    ->sortable(),

                Tables\Columns\TextColumn::make('group_size')
                    ->label('Группа')
                    ->suffix(' чел.')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_per_month')
                    ->label('Цена')
                    ->money('KGZ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->date('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлен')
                    ->date('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->label('Язык контента')
                    ->options([
                        'ru' => 'Русский',
                        'en' => 'Английский',
                        'de' => 'Немецкий',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereNotNull('title->' . $data['value']);
                        }
                    }),
                Tables\Filters\Filter::make('is_popular')
                    ->query(fn (Builder $query): Builder => $query->where('is_popular', true))
                    ->label('Только популярные')
                    ->indicator('Популярные'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->tooltip('Редактировать'),
                Tables\Actions\ViewAction::make()
                    ->label('')
                    ->tooltip('Просмотр'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Удалить выбранное')
                        ->modalHeading('Удаление выбранных курсов')
                        ->modalDescription('Вы уверены, что хотите удалить выбранные курсы? Это действие нельзя отменить.')
                        ->modalButton('Да, удалить'),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Создать новый курс'),
            ])
            ->defaultSort('created_at', 'desc')
            ->persistFiltersInSession()
            ->persistSearchInSession();
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
