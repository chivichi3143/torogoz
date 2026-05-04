<?php

namespace App\Filament\Resources\Beers\Schemas;

use App\Support\WebpUploader;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                FileUpload::make('image_bottle')
                    ->label('Imagen botella')
                    ->image()
                    ->disk('public')
                    ->directory('beers/bottles')
                    ->required()
                    ->saveUploadedFileUsing(
                        static fn (BaseFileUpload $component, TemporaryUploadedFile $file): ?string => WebpUploader::storeUploadedFileAsWebp(
                            file: $file,
                            disk: $component->getDiskName(),
                            directory: $component->getDirectory(),
                        ),
                    )
                    ->helperText('Se convierte automáticamente a WebP.'),
                FileUpload::make('image_background')
                    ->label('Imagen fondo')
                    ->image()
                    ->disk('public')
                    ->directory('beers/backgrounds')
                    ->required()
                    ->saveUploadedFileUsing(
                        static fn (BaseFileUpload $component, TemporaryUploadedFile $file): ?string => WebpUploader::storeUploadedFileAsWebp(
                            file: $file,
                            disk: $component->getDiskName(),
                            directory: $component->getDirectory(),
                        ),
                    )
                    ->helperText('Se convierte automáticamente a WebP.'),
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
