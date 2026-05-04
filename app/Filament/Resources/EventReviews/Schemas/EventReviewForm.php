<?php

namespace App\Filament\Resources\EventReviews\Schemas;

use App\Support\WebpUploader;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->saveUploadedFileUsing(
                        static fn (BaseFileUpload $component, TemporaryUploadedFile $file): ?string => WebpUploader::storeUploadedFileAsWebp(
                            file: $file,
                            disk: $component->getDiskName(),
                            directory: $component->getDirectory(),
                        ),
                    )
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
