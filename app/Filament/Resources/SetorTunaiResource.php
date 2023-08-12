<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetorTunaiResource\Pages;
use App\Filament\Resources\SetorTunaiResource\RelationManagers;
use App\Models\SetorTunai;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SetorTunaiResource extends Resource
{
    protected static ?string $model = SetorTunai::class;

    protected static ?string $navigationIcon = 'heroicon-o-login';

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
                    Forms\Components\TextInput::make('nomor_rekening')
                        ->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('jumlah')
                        ->integer(15)
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
            'index' => Pages\ListSetorTunais::route('/'),
            'create' => Pages\CreateSetorTunai::route('/create'),
            'edit' => Pages\EditSetorTunai::route('/{record}/edit'),
            'view' => Pages\ViewSetorTunai::route('/{record}'),
        ];
    }
}