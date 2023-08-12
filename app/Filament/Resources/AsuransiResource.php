<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsuransiResource\Pages;
use App\Filament\Resources\AsuransiResource\RelationManagers;
use App\Models\Asuransi;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsuransiResource extends Resource
{
    protected static ?string $model = Asuransi::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('ktp')
                        ->label('KTP')
                        ->integer(30)
                        ->required(),
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(100),
                    Forms\Components\Select::make('jenis_kelamin')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('tempat_lahir')
                        ->required()
                        ->maxLength(50),
                    Forms\Components\DatePicker::make('tanggal_lahir')
                        ->displayFormat('d/m/Y')
                        ->required(),
                    Forms\Components\Select::make('status_pernikahan')
                        ->options([
                            'Lajang' => 'Lajang',
                            'Menikah' => 'Menikah',
                            'Cerai' => 'Cerai',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('handphone')
                        ->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('negara')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('kelas')
                        ->options([
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('alamat')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\TextInput::make('kode_pos')
                        ->integer(20)
                        ->required(),
                    Forms\Components\TextInput::make('kk')
                        ->label('Kartu Keluarga')
                        ->integer(50)
                        ->required(),
                    Forms\Components\Select::make('status_keluarga')
                        ->options([
                            'Kepala Keluarga' => 'Kepala Keluarga',
                            'Istri' => 'Istri',
                            'Anak' => 'Anak',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('jumlah_anak')
                        ->integer()
                        ->required(),
                    Forms\Components\TextInput::make('nomor_rekening')
                        ->integer(50)
                        ->required(),
                    Forms\Components\TextInput::make('pemilik_rekening')
                        ->required()
                        ->maxLength(100),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('ktp')->label('KTP'),
                Tables\Columns\TextColumn::make('handphone'),
                Tables\Columns\TextColumn::make('email'),
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
            'index' => Pages\ListAsuransis::route('/'),
            'create' => Pages\CreateAsuransi::route('/create'),
            'edit' => Pages\EditAsuransi::route('/{record}/edit'),
            'view' => Pages\ViewAsuransi::route('/{record}'),
        ];
    }
}
