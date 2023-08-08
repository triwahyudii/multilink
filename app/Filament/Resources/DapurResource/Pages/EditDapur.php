<?php

namespace App\Filament\Resources\DapurResource\Pages;

use App\Filament\Resources\DapurResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDapur extends EditRecord
{
    protected static string $resource = DapurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
