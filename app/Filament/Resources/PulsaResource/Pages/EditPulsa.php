<?php

namespace App\Filament\Resources\PulsaResource\Pages;

use App\Filament\Resources\PulsaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPulsa extends EditRecord
{
    protected static string $resource = PulsaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
