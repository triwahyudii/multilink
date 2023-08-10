<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetorTunaiResource\Pages;
use App\Filament\Resources\SetorTunaiResource\RelationManagers;
use App\Models\SetorTunai;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SetorTunaiResource extends Resource
{
    protected static ?string $model = SetorTunai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bank')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->required(),
                Forms\Components\TextInput::make('jumlah')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bank'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nomor_rekening'),
                Tables\Columns\TextColumn::make('jumlah'),
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
            'index' => Pages\ListSetorTunais::route('/'),
            'create' => Pages\CreateSetorTunai::route('/create'),
            'edit' => Pages\EditSetorTunai::route('/{record}/edit'),
        ];
    }    
}
