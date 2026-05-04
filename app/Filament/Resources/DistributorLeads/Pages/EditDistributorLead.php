<?php

namespace App\Filament\Resources\DistributorLeads\Pages;

use App\Filament\Resources\DistributorLeads\DistributorLeadResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDistributorLead extends EditRecord
{
    protected static string $resource = DistributorLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
