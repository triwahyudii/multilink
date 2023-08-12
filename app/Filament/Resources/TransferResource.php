<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransferResource\Pages;
use App\Filament\Resources\TransferResource\RelationManagers;
use App\Models\Transfer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransferResource extends Resource
{
    protected static ?string $model = Transfer::class;

    protected static ?string $navigationIcon = 'heroicon-o-switch-vertical';

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
                    Forms\Components\TextInput::make('nama')->label('Nama pengirim')
                        ->required()
                        ->maxLength(200),
                    Forms\Components\TextInput::make('nomor_rekening')
                        ->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('jumlah')
                        ->integer(15)
                        ->required(),
                    Forms\Components\TextInput::make('nama_penerima')
                        ->required()
                        ->maxLength(200),
                    Forms\Components\TextInput::make('nomor_rekening_penerima')
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
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable()->label('Nama pengirim'),
                Tables\Columns\TextColumn::make('jumlah')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_penerima')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Entered')
                    ->date('d/m/Y'),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated')
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
            'index' => Pages\ListTransfers::route('/'),
            'create' => Pages\CreateTransfer::route('/create'),
            'edit' => Pages\EditTransfer::route('/{record}/edit'),
            'view' => Pages\ViewTransfer::route('/{record}'),
        ];
    }
}
