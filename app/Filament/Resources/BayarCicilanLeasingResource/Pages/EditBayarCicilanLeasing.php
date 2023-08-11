<?php

namespace App\Filament\Resources\BayarCicilanLeasingResource\Pages;

use App\Filament\Resources\BayarCicilanLeasingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBayarCicilanLeasing extends EditRecord
{
    protected static string $resource = BayarCicilanLeasingResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
