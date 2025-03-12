<?php

namespace App\Filament\Resources\RealisationResource\Pages;

use App\Filament\Resources\RealisationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealisations extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = RealisationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
