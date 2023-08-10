<?php

namespace App\Filament\Resources\SetorTunaiResource\Pages;

use App\Filament\Resources\SetorTunaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSetorTunais extends ListRecords
{
    protected static string $resource = SetorTunaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
