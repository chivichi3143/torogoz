<?php

namespace App\Filament\Resources\Beers\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BeerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required()
                    ->maxLength(64)
                    ->unique(ignoreRecord: true),
                TextInput::make('name')
                    ->required()
                    ->maxLength(128),
                TextInput::make('style')
                    ->required()
                    ->maxLength(128),
                ColorPicker::make('color')
                    ->required(),
                ColorPicker::make('accent')
                    ->required(),
                TextInput::make('abv')
                    ->label('ABV %')
                    ->required()
                    ->maxLength(16),
                TextInput::make('ibus')
                    ->label('IBU')
                    ->required()
                    ->maxLength(16),
                TextInput::make('amargor')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->default(1)
                    ->required(),
                TextInput::make('cuerpo')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->default(1)
                    ->required(),
                TextInput::make('aroma')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->default(1)
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('pairing')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('image_bottle')
                    ->label('Imagen botella (ruta)')
                    ->required()
                    ->maxLength(512)
                    ->helperText('Ej. /images/mi-botella.png'),
                TextInput::make('image_background')
                    ->label('Imagen fondo (ruta)')
                    ->required()
                    ->maxLength(512)
                    ->helperText('Ej. /images/mi-fondo.png'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
