<?php

namespace App\Filament\Resources\SayurResource\Pages;

use App\Filament\Resources\SayurResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class ViewSayur extends ViewRecord
{
    protected static string $resource = SayurResource::class;

}
