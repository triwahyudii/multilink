<?php

namespace App\Filament\Resources\DapurResource\Pages;

use App\Filament\Resources\DapurResource;
use App\Models\Dapur;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditDapur extends EditRecord
{
    protected static string $resource = DapurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (Dapur $record) {
                    if ($record->image) {
                        Storage::disk('public')->delete($record->image);
                    }
                }
            ),
        ];
    }
}
