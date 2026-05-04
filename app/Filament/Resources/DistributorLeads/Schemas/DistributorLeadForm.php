<?php

namespace App\Filament\Resources\DistributorLeads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DistributorLeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('business_name')
                    ->required(),
                TextInput::make('contact_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('estimated_volume')
                    ->required(),
                Textarea::make('message')
                    ->columnSpanFull(),
                Toggle::make('is_contacted')
                    ->required(),
            ]);
    }
}
