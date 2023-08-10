<?php

namespace App\Filament\Resources\PulsaResource\Pages;

use App\Filament\Resources\PulsaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPulsas extends ListRecords
{
    protected static string $resource = PulsaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
