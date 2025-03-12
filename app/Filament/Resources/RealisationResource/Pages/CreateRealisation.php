<?php

namespace App\Filament\Resources\RealisationResource\Pages;

use App\Filament\Resources\RealisationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRealisation extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;


    protected static string $resource = RealisationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
    }
}
