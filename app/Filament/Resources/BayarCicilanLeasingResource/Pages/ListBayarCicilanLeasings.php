<?php

namespace App\Filament\Resources\BayarCicilanLeasingResource\Pages;

use App\Filament\Resources\BayarCicilanLeasingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBayarCicilanLeasings extends ListRecords
{
    protected static string $resource = BayarCicilanLeasingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
