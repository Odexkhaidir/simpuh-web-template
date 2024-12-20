<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParameterUmumResource\Pages;
use App\Filament\Resources\ParameterUmumResource\RelationManagers;
use App\Models\ParameterUmum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParameterUmumResource extends Resource
{
    protected static ?string $model = ParameterUmum::class;

    protected static ?string $navigationIcon = 'heroicon-c-list-bullet';

    protected static ?string $navigationGroup = 'Indikator Kekumuhan';

    protected static ?string $navigationLabel = 'Parameter Umum';

    protected static ?string $modelLabel = 'Parameter Umum Desa';

    protected static ?string $pluralModelLabel = 'Parameter Umum Desa';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'parameter-umum';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_parameter_umum')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuan')
                    ->required()
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_parameter_umum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('satuan')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListParameterUmums::route('/'),
            'create' => Pages\CreateParameterUmum::route('/create'),
            'edit' => Pages\EditParameterUmum::route('/{record}/edit'),
        ];
    }
}