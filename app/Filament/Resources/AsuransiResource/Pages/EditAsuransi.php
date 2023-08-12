<?php

namespace App\Filament\Resources\AsuransiResource\Pages;

use App\Filament\Resources\AsuransiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsuransi extends EditRecord
{
    protected static string $resource = AsuransiResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
