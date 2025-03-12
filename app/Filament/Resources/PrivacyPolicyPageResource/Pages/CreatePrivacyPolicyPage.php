<?php

namespace App\Filament\Resources\PrivacyPolicyPageResource\Pages;

use App\Filament\Resources\PrivacyPolicyPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrivacyPolicyPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static bool $canCreateAnother = false;

    protected static string $resource = PrivacyPolicyPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
    }
}
