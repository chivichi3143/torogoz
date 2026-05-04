<?php

namespace App\Filament\Resources\Beers;

use App\Filament\Resources\Beers\Pages\CreateBeer;
use App\Filament\Resources\Beers\Pages\EditBeer;
use App\Filament\Resources\Beers\Pages\ListBeers;
use App\Filament\Resources\Beers\Schemas\BeerForm;
use App\Filament\Resources\Beers\Tables\BeersTable;
use App\Models\Beer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BeerResource extends Resource
{
    protected static ?string $model = Beer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Cervezas';

    protected static ?string $modelLabel = 'Cerveza';

    protected static ?string $pluralModelLabel = 'Cervezas';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BeerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BeersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBeers::route('/'),
            'create' => CreateBeer::route('/create'),
            'edit' => EditBeer::route('/{record}/edit'),
        ];
    }
}
