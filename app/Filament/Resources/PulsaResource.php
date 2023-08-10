<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PulsaResource\Pages;
use App\Filament\Resources\PulsaResource\RelationManagers;
use App\Models\Pulsa;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PulsaResource extends Resource
{
    protected static ?string $model = Pulsa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('provider')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('nomor_handphone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('pulsa')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('provider'),
                Tables\Columns\TextColumn::make('nomor_handphone'),
                Tables\Columns\TextColumn::make('pulsa'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }    
}
