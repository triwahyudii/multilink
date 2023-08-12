<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BayarCicilanLeasingResource\Pages;
use App\Filament\Resources\BayarCicilanLeasingResource\RelationManagers;
use App\Models\BayarCicilanLeasing;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BayarCicilanLeasingResource extends Resource
{
    protected static ?string $model = BayarCicilanLeasing::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('leasing')
                        ->options([
                            'FIF' => 'FIF',
                            'WOM' => 'WOM',
                            'BAF' => 'BAF',
                            'ADIRA' => 'ADIRA',
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
                Tables\Columns\TextColumn::make('leasing')->sortable()->searchable(),
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
            'index' => Pages\ListBayarCicilanLeasings::route('/'),
            'create' => Pages\CreateBayarCicilanLeasing::route('/create'),
            'edit' => Pages\EditBayarCicilanLeasing::route('/{record}/edit'),
            'view' => Pages\ViewBayarCicilanLeasing::route('/{record}'),
        ];
    }
}