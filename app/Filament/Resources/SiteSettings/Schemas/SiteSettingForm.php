<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use App\Support\WebVideoUploader;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('hero_video_hint')
                    ->label('Video de fondo del hero')
                    ->content('Sube un video y se convertirá automáticamente a MP4 (H.264), optimizado para web con buena calidad.'),
                FileUpload::make('hero_video_path')
                    ->label('Video del hero')
                    ->acceptedFileTypes([
                        'video/mp4',
                        'video/webm',
                        'video/quicktime',
                        'video/x-matroska',
                    ])
                    ->maxSize(30720)
                    ->minSize(100)
                    ->disk('public')
                    ->directory('hero-videos')
                    ->saveUploadedFileUsing(
                        static fn (BaseFileUpload $component, TemporaryUploadedFile $file): ?string => WebVideoUploader::storeUploadedVideoForWeb(
                            file: $file,
                            disk: $component->getDiskName(),
                            directory: $component->getDirectory(),
                        ),
                    )
                    ->nullable()
                    ->helperText('Mín. 100KB y máx. 30MB (límite actual de PHP). Recomendado: 1080p y clips cortos para mejor rendimiento.'),
            ]);
    }
}
