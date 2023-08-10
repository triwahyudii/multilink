<?php

namespace App\Filament\Resources\SetorTunaiResource\Pages;

use App\Filament\Resources\SetorTunaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetorTunai extends EditRecord
{
    protected static string $resource = SetorTunaiResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
