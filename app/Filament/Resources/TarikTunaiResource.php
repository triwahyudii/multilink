<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TarikTunaiResource\Pages;
use App\Filament\Resources\TarikTunaiResource\RelationManagers;
use App\Models\TarikTunai;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TarikTunaiResource extends Resource
{
    protected static ?string $model = TarikTunai::class;

    protected static ?string $navigationIcon = 'heroicon-o-logout';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('bank')
                        ->options([
                            'BRI' => 'BRI',
                            'BCA' => 'BCA',
                            'BNI' => 'BNI',
                            'MANDIRI' => 'MANDIRI',
                        ])->required(),
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(200),
                    Forms\Components\TextInput::make('nomor_rekening')->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('jumlah')->integer(15)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bank')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->sortable()->searchable(),
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
            'index' => Pages\ListTarikTunais::route('/'),
            'create' => Pages\CreateTarikTunai::route('/create'),
            'edit' => Pages\EditTarikTunai::route('/{record}/edit'),
            'view' => Pages\ViewTarikTunai::route('/{record}'),
        ];
    }
}
