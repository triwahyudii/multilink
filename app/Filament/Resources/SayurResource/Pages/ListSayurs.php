<?php

namespace App\Filament\Resources\SayurResource\Pages;

use App\Filament\Resources\SayurResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSayurs extends ListRecords
{
    protected static string $resource = SayurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
