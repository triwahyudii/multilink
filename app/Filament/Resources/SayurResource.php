<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SayurResource\Pages;
use App\Filament\Resources\SayurResource\RelationManagers;
use App\Models\Sayur;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class SayurResource extends Resource
{
    protected static ?string $model = Sayur::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('status')
                        ->options([
                            'Process' => 'Process',
                            'Cancel' => 'Cancel',
                            'Done' => 'Done',
                        ])-> required(),
                    Forms\Components\TextInput::make('nama')->label('Nama barang')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('harga')
                        ->required(),
                    Forms\Components\FileUpload::make('image')
                        ->required()->image()->disk('public'),
                    Forms\Components\RichEditor::make('deskripsi')
                        ->required()
                        ->maxLength(65535),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('status')
                ->color(static function ($state): string {
                    if ($state === 'Process') {
                        return 'success';
                    }
                    if ($state === 'Cancel') {
                        return 'danger';
                    }
                    if ($state === 'Done') {
                        return 'primary';
                    }
                    
                    return 'secondary';
                })->sortable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable()->label('Nama Barang'),
                Tables\Columns\TextColumn::make('harga')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
                Tables\Actions\DeleteAction::make()->after(
                    function (Sayur $record) {
                        if ($record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    }
                ),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->after(
                    function (Collection $record) {
                        foreach ($record as $key => $value) {
                            if ($value->image) {
                                Storage::disk('public')->delete($value->image);
                            }
                        }
                    }
                ),
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
            'index' => Pages\ListSayurs::route('/'),
            'create' => Pages\CreateSayur::route('/create'),
            'edit' => Pages\EditSayur::route('/{record}/edit'),
            'view' => Pages\ViewSayur::route('/{record}'),
        ];
    }
}
