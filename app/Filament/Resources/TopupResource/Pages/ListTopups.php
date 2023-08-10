<?php

namespace App\Filament\Resources\TopupResource\Pages;

use App\Filament\Resources\TopupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopups extends ListRecords
{
    protected static string $resource = TopupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
