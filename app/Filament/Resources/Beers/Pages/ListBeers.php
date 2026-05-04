<?php

namespace App\Filament\Resources\Beers\Pages;

use App\Filament\Resources\Beers\BeerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBeers extends ListRecords
{
    protected static string $resource = BeerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
