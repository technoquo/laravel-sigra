<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Membership;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MembershipResource\Pages;
use App\Filament\Resources\MembershipResource\RelationManagers;

class MembershipResource extends Resource
{
    protected static ?string $model = Membership::class;

    public static ?string $label = 'Adhésions';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Adhésions';

    protected static ?string $navigationGroup = 'Abonnements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Adhésions')
                    ->schema([
                        Select::make('users_id')
                            ->label('Email')
                            ->relationship('users', 'email')
                            ->searchable()
                            ->required(),
                        Select::make('abonnements_id')
                            ->label('Plan')
                            ->relationship('abonnements', 'title')
                            ->required(),
                        Toggle::make('status')
                            ->label('Visibilité')
                            ->helperText('Activer ou désactiver Adhésion')
                            ->default(true),
                        CheckboxList::make('videos_id')
                            ->label('Videos')
                            ->options(function () {
                                return \App\Models\Video::where('type', 'privé')->pluck('name', 'id');
                            })->columns(4)
                            ->bulkToggleable()
                            ->searchable()


                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('abonnements.title')
                    ->label('Plan')
                    ->searchable(),

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

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemberships::route('/'),
            'create' => Pages\CreateMembership::route('/create'),
            'edit' => Pages\EditMembership::route('/{record}/edit'),
        ];
    }
}
