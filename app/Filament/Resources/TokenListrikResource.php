<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokenListrikResource\Pages;
use App\Filament\Resources\TokenListrikResource\RelationManagers;
use App\Models\TokenListrik;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokenListrikResource extends Resource
{
    protected static ?string $model = TokenListrik::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nomor_id')->label('ID pelanggan')
                        ->integer(30)
                        ->required(),
                    Forms\Components\Select::make('nominal')
                        ->options([
                            '20000' => '20000',
                            '50000' => '50000',
                            '100000' => '100000',
                            '200000' => '200000',
                            '500000' => '500000',
                        ])
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_id')->sortable()->searchable()->label('ID pelanggan'),
                Tables\Columns\TextColumn::make('nominal')->sortable(),
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
            'index' => Pages\ListTokenListriks::route('/'),
            'create' => Pages\CreateTokenListrik::route('/create'),
            'edit' => Pages\EditTokenListrik::route('/{record}/edit'),
            'view' => Pages\ViewTokenListrik::route('/{record}'),
        ];
    }
}
