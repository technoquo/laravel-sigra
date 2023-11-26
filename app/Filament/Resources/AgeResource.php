<?php

namespace App\Filament\Resources;

use App\Models\Age;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AgeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AgeResource\RelationManagers;

class AgeResource extends Resource
{
    protected static ?string $model = Age::class;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Ages';

    protected static ?string $navigationGroup = 'Multimedias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('name')->label('Age')
                                ->required(),
                            Toggle::make('status')
                                ->label('Visibilité')
                                ->helperText('Activer ou désactiver la visibilité des catégories')
                                ->default(true),
                        ])->columns(2)
                    ]),
                Group::make()
                    ->schema([
                        Section::make([
                            FileUpload::make('image')
                                ->directory('form-attachments')
                                ->preserveFilenames()
                                ->image()
                                ->imageEditor()
                                ->required()
                        ])->collapsible()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('status')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Visibility'),
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
            'index' => Pages\ListAges::route('/'),
            'create' => Pages\CreateAge::route('/create'),
            'edit' => Pages\EditAge::route('/{record}/edit'),
        ];
    }
}
