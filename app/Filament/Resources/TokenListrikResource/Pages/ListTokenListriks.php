<?php

namespace App\Filament\Resources\TokenListrikResource\Pages;

use App\Filament\Resources\TokenListrikResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTokenListriks extends ListRecords
{
    protected static string $resource = TokenListrikResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
