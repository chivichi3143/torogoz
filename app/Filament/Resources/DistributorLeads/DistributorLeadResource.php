<?php

namespace App\Filament\Resources\DistributorLeads;

use App\Filament\Resources\DistributorLeads\Pages\CreateDistributorLead;
use App\Filament\Resources\DistributorLeads\Pages\EditDistributorLead;
use App\Filament\Resources\DistributorLeads\Pages\ListDistributorLeads;
use App\Filament\Resources\DistributorLeads\Schemas\DistributorLeadForm;
use App\Filament\Resources\DistributorLeads\Tables\DistributorLeadsTable;
use App\Models\DistributorLead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DistributorLeadResource extends Resource
{
    protected static ?string $model = DistributorLead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'business_name';

    public static function form(Schema $schema): Schema
    {
        return DistributorLeadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DistributorLeadsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDistributorLeads::route('/'),
            'create' => CreateDistributorLead::route('/create'),
            'edit' => EditDistributorLead::route('/{record}/edit'),
        ];
    }
}
