<?php

namespace App\Filament\Resources\TagihanListrikResource\Pages;

use App\Filament\Resources\TagihanListrikResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagihanListriks extends ListRecords
{
    protected static string $resource = TagihanListrikResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
