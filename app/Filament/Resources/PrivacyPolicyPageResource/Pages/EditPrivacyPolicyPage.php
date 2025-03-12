<?php

namespace App\Filament\Resources\PrivacyPolicyPageResource\Pages;

use App\Filament\Resources\PrivacyPolicyPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrivacyPolicyPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PrivacyPolicyPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
