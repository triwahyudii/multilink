<?php

namespace App\Filament\Resources\DapurResource\Pages;

use App\Filament\Resources\DapurResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDapurs extends ListRecords
{
    protected static string $resource = DapurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
