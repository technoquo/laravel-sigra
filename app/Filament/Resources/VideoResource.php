<?php

namespace App\Filament\Resources;

use App\Enums\VideoTypeEnum;
use Filament\Forms;
use Filament\Tables;
use App\Models\Video;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VideoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VideoResource\RelationManagers;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Video';

    protected static ?string $navigationGroup = 'Multimedias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')->label('nom de la vidéo')
                        ->required(),
                    TextInput::make('vimeo')->label('code viméo')
                        ->required(),
                    Toggle::make('status')
                        ->label('Visibilité')
                        ->helperText('Activer ou désactiver la visibilité des videos')
                        ->default(true),
                    Select::make('type')
                        ->options([
                            'publique' => VideoTypeEnum::PUBLIQUE->value,
                            'privé' => VideoTypeEnum::PRIVE->value,
                        ])->required()
                ])->columns(2),
                Section::make('Les associations')
                    ->schema([
                        Select::make('age_id')
                            ->relationship('ages', 'name')
                            ->required(),
                        Select::make('category_id')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->required(),
                        Select::make('subcategory_id')
                            ->relationship('subcategories', 'name')
                            ->nullable(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ages.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('categories.name')
                    ->label('catégories')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')

            ])
            ->filters([
                SelectFilter::make('ages')
                    ->relationship('ages', 'name')
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
