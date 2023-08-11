<?php

namespace App\Filament\Resources\TagihanListrikResource\Pages;

use App\Filament\Resources\TagihanListrikResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagihanListrik extends EditRecord
{
    protected static string $resource = TagihanListrikResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
