<?php

namespace App\Filament\Resources\HomeResource\Pages;

use App\Filament\Resources\HomeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHome extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static bool $canCreateAnother = false;


    protected static string $resource = HomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
    }
}
