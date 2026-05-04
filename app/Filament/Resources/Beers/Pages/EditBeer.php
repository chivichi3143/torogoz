<?php

namespace App\Filament\Resources\Beers\Pages;

use App\Filament\Resources\Beers\BeerResource;
use Filament\Resources\Pages\EditRecord;

class EditBeer extends EditRecord
{
    protected static string $resource = BeerResource::class;
}
