<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Home;
use Filament\Tables;
use App\Models\Social;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Awcodes\Shout\Components\Shout;
use Filament\Forms\Components\Tabs;
use Livewire\Component as Livewire;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Component;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\HomeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HomeResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class HomeResource extends Resource
{

    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['pl', 'sk'];
    }

    protected static ?string $model = Home::class;

    protected static ?string $navigationGroup = 'Strona główna';

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

                        // Info
                        Tabs\Tab::make('Głowne informacje')
                            ->icon('heroicon-o-information-circle')
                            ->columns()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Pełna nazwa firmy')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logo')
                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'logo-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->maxSize(8192)
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('nip')
                                    ->label('NIP')
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),

                                Fieldset::make('Mapa')
                                    ->schema([

                                        Forms\Components\TextInput::make('google_link')
                                            ->label('Link do wizytówki google')
                                            ->columnSpanFull()
                                            ->url(),

                                        Forms\Components\Textarea::make('google_map')
                                            ->label('Google Maps iFrame')
                                            ->placeholder("<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2592.547169189393!2d20.00688517730142!3d49.474170357174515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4715e5905e21c0ed%3A0x159c133ae9b83572!2sMarketingMix!5e0!3m2!1spl!2spl!4v1727760651042!5m2!1spl!2spl' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade' title='apartament-willa' class='w-full'></iframe>")
                                            ->autosize()
                                            ->columnSpanFull(),



                                        Shout::make('so-important')
                                            ->content('Dodaj to mapy tagi:  title="mixo-expert" class="w-full"')
                                            ->color('warning')
                                            ->columnSpanFull(),
                                    ])


                            ]),

                        // CONTACT
                        Tabs\Tab::make('Dane kontaktowe')
                            ->icon('heroicon-o-phone')
                            ->columns()
                            ->schema([
                                Forms\Components\TextInput::make('address')
                                    ->label('Ulica')
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('city')
                                    ->label('Kod pocztowy i miejscowość')
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),

                                Forms\Components\TextInput::make('phone')
                                    ->label('Telefon')
                                    ->prefix("+48")
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),


                                Fieldset::make('Social Media')
                                    ->schema([
                                        Repeater::make('socials')
                                            ->schema(Social::getForm())
                                            ->label('')
                                            ->relationship()
                                            ->columnSpanFull()
                                            ->itemLabel(fn(array $state): ?string => $state['name'] ?? null)
                                            ->addActionLabel('Dodaj social')
                                            ->collapsed()
                                            ->collapsible()
                                            ->grid(2)
                                            ->defaultItems(0)
                                    ])

                            ]),

                        // HERO
                        Tabs\Tab::make('Hero')
                            ->icon('heroicon-o-photo')
                            ->columns()
                            ->schema([
                                Shout::make('info')
                                    ->content('Dodaj treść która pojawi się w pierwszej sekcji')
                                    ->type('info')
                                    ->color('info')
                                    ->columnSpanFull(),


                                Forms\Components\TextInput::make('hero_heading')
                                    ->label('Nagłówek')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('hero_text')
                                    ->label('Tekst')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->columnSpanFull()
                                    ->required(),


                                Forms\Components\FileUpload::make(name: 'hero_image')
                                    ->label('Zdjęcie')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make(name: 'hero_background')
                                    ->label('Tło')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                            ]),

                        // OFFER
                        Tabs\Tab::make('Oferta')
                            ->icon('heroicon-o-wrench')
                            ->columns()
                            ->schema([
                                Shout::make('info')
                                    ->content('Dodaj treść która pojawi się w  sekcji oferta')
                                    ->type('info')
                                    ->color('info')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('offer_subheading')
                                    ->label('Mniejszy nagłówek')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('offer_heading')
                                    ->label('Nagłówek')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('offer_text')
                                    ->label('Tekst')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->columnSpanFull()
                                    ->required(),

                            ]),

                        // ABOUT
                        Tabs\Tab::make('O nas')
                            ->icon('heroicon-o-user')
                            ->columns()
                            ->schema([
                                Shout::make('info')
                                    ->content('Dodaj treść która pojawi się w  sekcji o nas')
                                    ->type('info')
                                    ->color('info')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('about_subheading')
                                    ->label('Mniejszy nagłówek')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('about_heading')
                                    ->label('Nagłówek')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('about_text')
                                    ->label('Tekst')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->columnSpanFull()
                                    ->required(),


                                Forms\Components\FileUpload::make(name: 'about_image')
                                    ->label('Zdjęcie')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make(name: 'about_background')
                                    ->label('Tło')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                            ]),

                        // REALISATIONS
                        Tabs\Tab::make('Realizacje')
                            ->icon('heroicon-o-sparkles')
                            ->columns()
                            ->schema([
                                Shout::make('info')
                                    ->content('Dodaj treść która pojawi się w  sekcji realizacje')
                                    ->type('info')
                                    ->color('info')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('realisations_subheading')
                                    ->label('Mniejszy nagłówek')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('realisations_heading')
                                    ->label('Nagłówek')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('realisations_text')
                                    ->label('Tekst')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->columnSpanFull()
                                    ->required(),


                                Forms\Components\FileUpload::make(name: 'realisations_image')
                                    ->label('Zdjęcie')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make(name: 'realisations_background')
                                    ->label('Tło')

                                    ->directory('home')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'mixo-expert-' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                                    )
                                    ->appendFiles()
                                    ->image()
                                    ->maxSize(8192)

                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->required(),
                            ]),

                        // COOPERATION
                        Tabs\Tab::make('Współpraca')
                            ->icon('heroicon-o-users')
                            ->columns()
                            ->schema([
                                Shout::make('info')
                                    ->content('Dodaj treść która pojawi się w  sekcji współpraca')
                                    ->type('info')
                                    ->color('info')
                                    ->columnSpanFull(),

                                    Forms\Components\TextInput::make('cooperation_subheading')
                                    ->label('Mniejszy nagłówek')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('cooperation_heading')
                                    ->label('Nagłówek')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('cooperation_text')
                                    ->label('Tekst')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->columnSpanFull()
                                    ->required(),



                            ]),

                        // SEO
                        Tabs\Tab::make('Meta')
                            ->icon('heroicon-o-globe-alt')
                            ->columns()
                            ->schema([


                                TextInput::make('meta_title')
                                    ->label('Tytuł Meta')
                                    ->placeholder('Meta title to tytuł strony internetowej wyświetlany w wynikach wyszukiwarek i na kartach przeglądarki.')
                                    ->characterLimit(60)
                                    ->minLength(10)
                                    ->maxLength(75)
                                    ->live(debounce: 1000)
                                    ->afterStateUpdated(function (Livewire $livewire, Component $component) {
                                        $validate = $livewire->validateOnly($component->getStatePath());
                                    })
                                    ->columnSpanFull()
                                    ->required(),

                                TextInput::make('meta_description')
                                    ->label('Opis Meta')
                                    ->placeholder('Meta description to krótki opis strony internetowej wyświetlany w wynikach wyszukiwarek.')
                                    ->characterLimit(160)
                                    ->minLength(10)
                                    ->maxLength(180)
                                    ->live(debounce: 1000)
                                    ->afterStateUpdated(function (Livewire $livewire, Component $component) {
                                        $validate = $livewire->validateOnly($component->getStatePath());
                                    })
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\TextInput::make('keywords')
                                    ->label('Słowa kluczowe')
                                    ->hint('Rozdzielaj słowa kluczowe za pomocą ,')
                                    ->columnSpanFull()
                                    ->required(),

                                Forms\Components\FileUpload::make('og_image')
                                    ->label('Zdjęcie OpenGraph')
                                    ->directory('home')
                                    ->hint('Zdjęcie które pojawi się podczas udostępniania strony głównej w social media')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'strona-glowna-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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

                                Fieldset::make('Skrypty')
                                    ->schema([



                                        Forms\Components\Textarea::make('scripts_head_top')
                                            ->label('Po tagu otwierającym <head>')
                                            ->autosize()
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('scripts_head_bottom')
                                            ->label('Przez tagiem zamykającym </head>')
                                            ->autosize()
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('scripts_body_top')
                                            ->label('Po tagu otwierającym <body>')
                                            ->autosize()
                                            ->columnSpanFull(),




                                    ])
                            ]),

                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Strona główna')
                    ->description(function (Home $record) {
                        return Str::of($record->meta_description)->limit(40);
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
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }

     public static function getNavigationLabel(): string
    {
        return ('Treść');
    }
    public static function getPluralLabel(): string
    {
        return ('Treść');
    }

    public static function getLabel(): string
    {
        return ('Treść');
    }
}
