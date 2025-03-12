<?php

namespace App\Filament\Resources\RealisationsPageResource\Pages;

use App\Filament\Resources\RealisationsPageResource;
use App\Models\RealisationsPage;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealisationsPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = RealisationsPageResource::class;

    protected function getHeaderActions(): array
    {

        $homeExists = RealisationsPage::exists();

        return array_filter([

            !$homeExists ? Actions\CreateAction::make() : null,
            Actions\LocaleSwitcher::make(),
        ]);
    }
}
