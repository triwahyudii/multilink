<?php

namespace App\Filament\Resources\TopupResource\Pages;

use App\Filament\Resources\TopupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopup extends EditRecord
{
    protected static string $resource = TopupResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
