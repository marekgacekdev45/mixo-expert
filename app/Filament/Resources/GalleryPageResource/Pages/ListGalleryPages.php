<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use Filament\Actions;
use App\Models\GalleryPage;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\GalleryPageResource;

class ListGalleryPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = GalleryPageResource::class;

    protected function getHeaderActions(): array
    {

        $pageExists = GalleryPage::exists();

        return array_filter([

            !$pageExists ? Actions\CreateAction::make() : null,
            Actions\LocaleSwitcher::make(),
        ]);
    }
}
