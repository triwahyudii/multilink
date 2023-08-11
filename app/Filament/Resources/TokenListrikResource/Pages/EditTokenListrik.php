<?php

namespace App\Filament\Resources\TokenListrikResource\Pages;

use App\Filament\Resources\TokenListrikResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTokenListrik extends EditRecord
{
    protected static string $resource = TokenListrikResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
