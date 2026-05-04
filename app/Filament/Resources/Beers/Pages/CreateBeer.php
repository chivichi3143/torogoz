<?php

namespace App\Filament\Resources\Beers\Pages;

use App\Filament\Resources\Beers\BeerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBeer extends CreateRecord
{
    protected static string $resource = BeerResource::class;
}
