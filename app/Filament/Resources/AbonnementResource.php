<?php

namespace App\Filament\Resources;


use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Abonnement;
use Filament\Tables\Table;
use App\Enums\TimeTypeEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AbonnementResource\Pages;
use App\Filament\Resources\AbonnementResource\RelationManagers;

class AbonnementResource extends Resource
{
    protected static ?string $model = Abonnement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Titre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')->label('Prix')
                    ->required()
                    ->numeric()
                    ->prefix('€'),
                Forms\Components\TextInput::make('qty')->label('Quantité')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Select::make('time')
                    ->options([
                        TimeTypeEnum::YEAR->value => 'année',
                        TimeTypeEnum::MONTH->value => 'mois',
                        TimeTypeEnum::VIDEO->value  => 'vidéo',
                    ])->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('EUR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),

                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

            ])
            ->filters([
                TernaryFilter::make('status')
                    ->label('Visibilité')
                    ->boolean()
                    ->trueLabel('Seul produit visible')
                    ->falseLabel('Seul plan caché')
                    ->native(false),
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
            'index' => Pages\ListAbonnements::route('/'),
            'create' => Pages\CreateAbonnement::route('/create'),
            'edit' => Pages\EditAbonnement::route('/{record}/edit'),
        ];
    }
}
