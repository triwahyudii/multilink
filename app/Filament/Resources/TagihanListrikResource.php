<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanListrikResource\Pages;
use App\Filament\Resources\TagihanListrikResource\RelationManagers;
use App\Models\TagihanListrik;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagihanListrikResource extends Resource
{
    protected static ?string $model = TagihanListrik::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nomor_id')->label('ID pelanggan')
                    ->integer(30)
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_id')->sortable()->searchable()->label('ID pelanggan'),
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
            'index' => Pages\ListTagihanListriks::route('/'),
            'create' => Pages\CreateTagihanListrik::route('/create'),
            'edit' => Pages\EditTagihanListrik::route('/{record}/edit'),
            'view' => Pages\ViewTagihanListrik::route('/{record}'),
        ];
    }
}
