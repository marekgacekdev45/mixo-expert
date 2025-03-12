<?php

namespace App\Filament\Resources\RealisationsPageResource\Pages;

use App\Filament\Resources\RealisationsPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRealisationsPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static bool $canCreateAnother = false;
    protected static string $resource = RealisationsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
    }
}
