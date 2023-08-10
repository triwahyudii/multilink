<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PulsaResource\Pages;
use App\Filament\Resources\PulsaResource\RelationManagers;
use App\Models\Pulsa;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PulsaResource extends Resource
{
    protected static ?string $model = Pulsa::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-mobile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Forms\Components\Select::make('provider')
                        ->options([
                            'INDOSAT' => 'INDOSAT',
                            'TELKOMSEL' => 'TELKOMSEL',
                            'XL' => 'XL',
                        ])->required(),
                    Forms\Components\TextInput::make('nomor_handphone')
                        ->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('pulsa')
                        ->integer(20)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('provider')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nomor_handphone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pulsa')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Entered')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPulsas::route('/'),
            'create' => Pages\CreatePulsa::route('/create'),
            'edit' => Pages\EditPulsa::route('/{record}/edit'),
            'view' => Pages\ViewPulsa::route('/{record}'),
        ];
    }
}
