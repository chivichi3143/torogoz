<?php

namespace App\Filament\Resources\GalleryItems\Schemas;

use App\Models\GalleryItem;
use App\Support\WebpUploader;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GalleryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category')
                    ->options(GalleryItem::categoryLabels())
                    ->required(),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Imagen')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->required()
                    ->getUploadedFileUsing(static function (BaseFileUpload $component, string $file, string | array | null $storedFileNames): ?array {
                        $storage = $component->getDisk();

                        try {
                            if (! $storage->exists($file)) {
                                return null;
                            }
                        } catch (\Throwable) {
                            return null;
                        }

                        $normalized = ltrim(str_replace('\\', '/', $file), '/');
                        $url = route('media.public', ['path' => $normalized], absolute: false);

                        return [
                            'name' => basename($file),
                            'size' => Storage::disk($component->getDiskName())->size($file),
                            'type' => Storage::disk($component->getDiskName())->mimeType($file),
                            'url' => $url,
                        ];
                    })
                    ->saveUploadedFileUsing(
                        static fn (BaseFileUpload $component, TemporaryUploadedFile $file): ?string => WebpUploader::storeUploadedFileAsWebp(
                            file: $file,
                            disk: $component->getDiskName(),
                            directory: $component->getDirectory(),
                        ),
                    )
                    ->helperText('Sube una imagen; se convertirá automáticamente a WebP.'),
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
