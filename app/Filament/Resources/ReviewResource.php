<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ReviewResource\Pages;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make()
                ->schema([
                    FileUpload::make('preview_image')
                        ->image()
                        ->required()
                        ->columnSpan(1),

                    FileUpload::make('video_path')
                        ->label('Видео')
                        ->disk('public')
                        ->directory('reviews/videos')
                        ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->maxSize(51200)
                        ->required()
                        ->enableReordering(false)
                        ->columnSpan(1),
                ])
                ->columns(2)
                ]);
                }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comment')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('preview_image'),
                Tables\Columns\TextColumn::make('video_path')
                    ->searchable(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
