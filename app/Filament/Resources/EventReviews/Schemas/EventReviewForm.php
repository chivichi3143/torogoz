<?php

namespace App\Filament\Resources\EventReviews\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('event_id')
                    ->relationship('event', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('author_name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Correo')
                    ->email()
                    ->maxLength(255),
                Textarea::make('comment')
                    ->label('Comentario')
                    ->columnSpanFull(),
                FileUpload::make('photo_path')
                    ->label('Fotografía')
                    ->image()
                    ->disk('public')
                    ->directory('event-reviews')
                    ->nullable(),
                Toggle::make('accepted_terms')
                    ->label('Aceptó términos')
                    ->default(false),
                Toggle::make('is_approved')
                    ->label('Aprobada')
                    ->required(),
            ]);
    }
}
