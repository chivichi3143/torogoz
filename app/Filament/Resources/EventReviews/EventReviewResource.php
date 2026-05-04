<?php

namespace App\Filament\Resources\EventReviews;

use App\Filament\Resources\EventReviews\Pages\CreateEventReview;
use App\Filament\Resources\EventReviews\Pages\EditEventReview;
use App\Filament\Resources\EventReviews\Pages\ListEventReviews;
use App\Filament\Resources\EventReviews\Schemas\EventReviewForm;
use App\Filament\Resources\EventReviews\Tables\EventReviewsTable;
use App\Models\EventReview;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EventReviewResource extends Resource
{
    protected static ?string $model = EventReview::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'author_name';

    protected static ?string $navigationLabel = 'Reseñas y fotos';

    protected static ?string $modelLabel = 'Reseña';

    protected static ?string $pluralModelLabel = 'Reseñas';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return EventReviewForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventReviewsTable::configure($table);
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
            'index' => ListEventReviews::route('/'),
            'create' => CreateEventReview::route('/create'),
            'edit' => EditEventReview::route('/{record}/edit'),
        ];
    }
}
