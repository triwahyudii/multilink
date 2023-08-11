<?php

namespace App\Filament\Resources\BayarCicilanResource\Pages;

use App\Filament\Resources\BayarCicilanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBayarCicilan extends EditRecord
{
    protected static string $resource = BayarCicilanResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
