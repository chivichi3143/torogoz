<?php

namespace App\Filament\Resources\DistributorLeads\Pages;

use App\Filament\Resources\DistributorLeads\DistributorLeadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDistributorLeads extends ListRecords
{
    protected static string $resource = DistributorLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
