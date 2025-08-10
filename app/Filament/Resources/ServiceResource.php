<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Услуги'; 
    protected static ?string $pluralModelLabel = 'Услуги'; 
    protected static ?string $navigationLabel = 'Услуги';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Переводы')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Russian')
                            ->schema([
                                Forms\Components\TextInput::make('title.ru')
                                    ->label('Title (RU)')
                                    ->required(),
                                Forms\Components\Textarea::make('description.ru')
                                    ->label('Description (RU)')
                                    ->required(),
                                Forms\Components\RichEditor::make('content.ru')
                                    ->label('Content (RU)'),
                            ]),
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                                Forms\Components\Textarea::make('description.en')
                                    ->label('Description (EN)'),
                                Forms\Components\RichEditor::make('content.en')
                                    ->label('Content (EN)'),
                            ]),
                        Forms\Components\Tabs\Tab::make('German')
                            ->schema([
                                Forms\Components\TextInput::make('title.de')
                                    ->label('Title (DE)'),
                                Forms\Components\Textarea::make('description.de')
                                    ->label('Description (DE)'),
                                Forms\Components\RichEditor::make('content.de')
                                    ->label('Content (DE)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Общая информация')
                    ->schema([
                        Forms\Components\TextInput::make('monthly_price')
                            ->required()
                            ->label('Цена за месяц')
                            ->numeric(),
                        Forms\Components\TextInput::make('full_price')
                            ->required()
                            ->label('Полная стоимость')
                            ->numeric(),
                       
                        Forms\Components\Toggle::make('active')
                            ->required()
                            ->label('Активный'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Заголовок')
                    ->formatStateUsing(fn ($state) => $state[app()->getLocale()] ?? $state['en'] ?? $state['ru'] ?? '')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->en', 'like', "%{$search}%")
                            ->orWhere('title->ru', 'like', "%{$search}%")
                            ->orWhere('title->de', 'like', "%{$search}%");
                    }),
                Tables\Columns\TextColumn::make('monthly_price')
                    ->numeric()
                    ->sortable()
                    ->label('Цена за месяц')
                    ->money('USD'),
                Tables\Columns\TextColumn::make('full_price')
                    ->numeric()
                    ->sortable()
                    ->label('Полная стоимость')
                    ->money('USD'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->label('Активный'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->options([
                        'en' => 'English',
                        'ru' => 'Russian',
                        'de' => 'German',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereNotNull('title->'.$data['value']);
                        }
                    }),
                Tables\Filters\Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('active', true))
                    ->label('Only active'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
