<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Introduction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IntroductionResource\Pages;
use App\Filament\Resources\IntroductionResource\RelationManagers;

class IntroductionResource extends Resource
{
    protected static ?string $model = Introduction::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Accueil';

    protected static ?string $navigationGroup = 'Page de garde';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    TextInput::make('title')
                        ->label('Titre')
                        ->required(),
                    MarkdownEditor::make('intro')
                        ->label('Introduction')
                        ->required(),

                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('intro')->limit(50)

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
            'index' => Pages\ListIntroductions::route('/'),
            'create' => Pages\CreateIntroduction::route('/create'),
            'edit' => Pages\EditIntroduction::route('/{record}/edit'),
        ];
    }
}
