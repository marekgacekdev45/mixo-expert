<?php

namespace App\Filament\Resources\HomeResource\Pages;

use App\Models\Home;
use Filament\Actions;
use App\Filament\Resources\HomeResource;
use Filament\Resources\Pages\ListRecords;

class ListHomes extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = HomeResource::class;

    protected function getHeaderActions(): array
    {

        $homeExists = Home::exists();

        return array_filter([

            !$homeExists ? Actions\CreateAction::make() : null,
            Actions\LocaleSwitcher::make(),
        ]);
    }
}
