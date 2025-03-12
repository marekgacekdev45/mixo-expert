<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Realisation;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RealisationResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\RealisationResource\RelationManagers;

class RealisationResource extends Resource
{

    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['pl', 'sk'];
    }
    protected static ?string $model = Realisation::class;

    protected static ?string $navigationGroup = 'Realizacje';

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form

            ->schema([

                Forms\Components\TextInput::make('title')
                    ->label('Tytuł')
                    ->unique(ignoreRecord: true, column: 'title')
                    ->minLength(3)
                    ->maxLength(255)
                    ->required()
                    ->live(debounce: 1000)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->placeholder('Przyjazny adres url który wygeneruje się automatycznie')
                    ->readOnly(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Miniaturka')
                    ->directory('realizacje')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => 'realizacje-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
                    )
                    ->image()
                    ->maxSize(8192)

                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('gallery')
                    ->label('Galeria')
                    ->directory('realizacje')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => 'realizacje-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                    )
                    ->multiple()
                    ->appendFiles()
                    ->image()
                    ->reorderable()
                    ->hint('Max. 12 zdjęć')
                    ->maxSize(8192)
                    ->required()
                    ->imageEditor()
                    ->maxFiles(20)
                    ->panelLayout('grid')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])

                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('description')
                    ->label('Opis')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'redo',
                        'strike',
                        'underline',
                        'undo',

                    ])

                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->defaultSort('sort', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('sort')
                    ->label('#')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Miniaturka')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Nazwa realizacji')
                    ->description(function (Realisation $record) {
                        return Str::limit(strip_tags($record->description), 40);
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRealisations::route('/'),
            'create' => Pages\CreateRealisation::route('/create'),
            'edit' => Pages\EditRealisation::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ('Realizacja');
    }
    public static function getPluralLabel(): string
    {
        return ('Realizacja');
    }

    public static function getLabel(): string
    {
        return ('Realizacja');
    }
}
