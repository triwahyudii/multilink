<?php

namespace App\Filament\Resources\SayurResource\Pages;

use App\Filament\Resources\SayurResource;
use App\Models\Sayur;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditSayur extends EditRecord
{
    protected static string $resource = SayurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (Sayur $record) {
                    if ($record->image) {
                        Storage::disk('public')->delete($record->image);
                    }
                }
            ),
        ];
    }
}
