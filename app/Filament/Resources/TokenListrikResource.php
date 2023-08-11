<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokenListrikResource\Pages;
use App\Filament\Resources\TokenListrikResource\RelationManagers;
use App\Models\TokenListrik;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokenListrikResource extends Resource
{
    protected static ?string $model = TokenListrik::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_id')
                    ->required(),
                Forms\Components\TextInput::make('nominal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_id'),
                Tables\Columns\TextColumn::make('nominal'),
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
            'index' => Pages\ListTokenListriks::route('/'),
            'create' => Pages\CreateTokenListrik::route('/create'),
            'edit' => Pages\EditTokenListrik::route('/{record}/edit'),
        ];
    }    
}
