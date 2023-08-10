<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopupResource\Pages;
use App\Filament\Resources\TopupResource\RelationManagers;
use App\Models\Topup;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopupResource extends Resource
{
    protected static ?string $model = Topup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('nama')
                        ->label('Game')
                        ->options([
                            'DOMINO HIGGS' => 'DOMINO HIGGS',
                            'MOBILE LEGEND' => 'MOBILE LEGEND',
                            'AOV' => 'AOV',
                            'FREE FIRE' => 'FREE FIRE',
                            'CALL OF DUTY' => 'CALL OF DUTY',
                            'PUBG' => 'PUBG',
                        ])->required(),
                    Forms\Components\TextInput::make('nomor_id')
                        ->integer(30)
                        ->required(),
                    Forms\Components\Select::make('jumlah')
                        ->integer(20)
                        ->options([
                            '10' => '10 Item',
                            '50' => '50 Item',
                            '100' => '100 Item',
                            '200' => '200 Item',
                            '500' => '500 Item',
                            '1000' => '1000 Item',
                        ])
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable()->label('Game'),
                Tables\Columns\TextColumn::make('nomor_id')->sortable()->searchable(),
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
            'index' => Pages\ListTopups::route('/'),
            'create' => Pages\CreateTopup::route('/create'),
            'edit' => Pages\EditTopup::route('/{record}/edit'),
            'view' => Pages\ViewTopup::route('/{record}'),
        ];
    }
}
