<?php

namespace App\Filament\Resources\AsuransiResource\Pages;

use App\Filament\Resources\AsuransiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsuransis extends ListRecords
{
    protected static string $resource = AsuransiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
