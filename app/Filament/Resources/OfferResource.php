<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Offer;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Livewire\Component as Livewire;
use Filament\Forms\Components\Component;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\OfferResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OfferResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class OfferResource extends Resource
{

    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['pl', 'sk'];
    }
    protected static ?string $model = Offer::class;

    protected static ?string $navigationGroup = 'Oferty';

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([

                        Tabs\Tab::make('Info')
                            ->icon('heroicon-o-information-circle')
                            ->columns()
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


                                Forms\Components\FileUpload::make('icon')
                                    ->label('Ikonka')
                                    ->directory('oferty')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'oferty-ikonka-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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
                                    
                                    ->columnSpanFull(),

                                Forms\Components\FileUpload::make('thumbnail')
                                    ->label('Banner')
                                    ->directory('oferty')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'oferty-ikonka-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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

                                Forms\Components\Textarea::make('short_description')
                                ->label('Krótki opis')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),


                                


                            ]),
                        Tabs\Tab::make('Treść')
                            ->icon('heroicon-o-pencil')
                            ->columns()
                            ->schema([
                                Forms\Components\RichEditor::make('content')
                                    ->label('Treść')
                                  
                                    ->required()
                                    ->columnSpanFull(),
                            ])


                    ])
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
            Tables\Columns\TextColumn::make('title')
                ->label('Nazwa oferty')
                ->description(function (Offer $record) {
                    return Str::limit(strip_tags($record->short_description), 40);
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ('Oferta');
    }
    public static function getPluralLabel(): string
    {
        return ('Oferta');
    }

    public static function getLabel(): string
    {
        return ('Oferta');
    }
}
