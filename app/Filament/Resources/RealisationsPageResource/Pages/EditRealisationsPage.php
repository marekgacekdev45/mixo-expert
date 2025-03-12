<?php

namespace App\Filament\Resources\RealisationsPageResource\Pages;

use App\Filament\Resources\RealisationsPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealisationsPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = RealisationsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
