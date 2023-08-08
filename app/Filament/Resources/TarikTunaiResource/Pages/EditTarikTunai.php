<?php

namespace App\Filament\Resources\TarikTunaiResource\Pages;

use App\Filament\Resources\TarikTunaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTarikTunai extends EditRecord
{
    protected static string $resource = TarikTunaiResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
