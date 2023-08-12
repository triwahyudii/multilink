<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BayarCicilanResource\Pages;
use App\Filament\Resources\BayarCicilanResource\RelationManagers;
use App\Models\BayarCicilan;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BayarCicilanResource extends Resource
{
    protected static ?string $model = BayarCicilan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

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
                    Forms\Components\TextInput::make('nomor_tagihan')
                        ->integer(50)
                        ->required(),
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(200),
                    Forms\Components\TextInput::make('jumlah')
                        ->integer(20)
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
                Tables\Columns\TextColumn::make('nomor_tagihan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Entered')
                    ->dateTime('d/m/Y'),
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
            'index' => Pages\ListBayarCicilans::route('/'),
            'create' => Pages\CreateBayarCicilan::route('/create'),
            'edit' => Pages\EditBayarCicilan::route('/{record}/edit'),
            'view' => Pages\ViewBayarCicilan::route('/{record}'),
        ];
    }
}
