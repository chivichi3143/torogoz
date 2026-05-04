<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('maps_url')
                    ->label('URL de Google Maps')
                    ->url()
                    ->maxLength(2048)
                    ->nullable()
                    ->helperText('Opcional. Enlace a la ubicación en Google Maps. Si lo dejas vacío, en el sitio se usará una búsqueda por el texto de “Ubicación”.'),
                FileUpload::make('image_url')
                    ->image()
                    ->disk('public')
                    ->directory('events'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
