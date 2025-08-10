<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $modelLabel = 'Вопрос-ответ';
    protected static ?string $pluralModelLabel = 'Часто задаваемые вопросы';
    protected static ?string $navigationLabel = 'FAQ';
    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Языковые версии')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Русский')
                        ->schema([
                            Forms\Components\TextInput::make('question.ru')
                                ->label('Вопрос (RU)*')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('answer.ru')
                                ->label('Ответ (RU)*')
                                ->required()
                                ->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Английский')
                        ->schema([
                            Forms\Components\TextInput::make('question.en')
                                ->label('Вопрос (EN)')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('answer.en')
                                ->label('Ответ (EN)')
                                ->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Немецкий')
                        ->schema([
                            Forms\Components\TextInput::make('question.de')
                                ->label('Вопрос (DE)')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('answer.de')
                                ->label('Ответ (DE)')
                                ->columnSpanFull(),
                        ]),
                ])
                ->persistTabInQueryString()
                ->columnSpanFull(),
                
     
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Вопрос')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return $state['ru'] ?? $state['en'] ?? $state['de'] ?? 'Без вопроса';
                        }
                        return $state;
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('question->ru', 'like', "%{$search}%")
                            ->orWhere('question->en', 'like', "%{$search}%")
                            ->orWhere('question->de', 'like', "%{$search}%");
                    }),
                    
                Tables\Columns\TextColumn::make('answer')
                    ->label('Ответ')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return Str::limit($state['ru'] ?? $state['en'] ?? $state['de'] ?? '', 50);
                        }
                        return Str::limit($state, 50);
                    })
                    ->tooltip(function ($record) {
                        if (is_array($record->answer)) {
                            return collect($record->answer)
                                ->map(fn ($val, $key) => "$key: $val")
                                ->implode(PHP_EOL);
                        }
                        return $record->answer;
                    }),
     
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->label('Язык')
                    ->options([
                        'ru' => 'Русский',
                        'en' => 'Английский',
                        'de' => 'Немецкий',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereNotNull("question->{$data['value']}");
                        }
                    }),
                    

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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
