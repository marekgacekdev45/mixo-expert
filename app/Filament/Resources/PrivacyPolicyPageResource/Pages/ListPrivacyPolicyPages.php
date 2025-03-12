<?php

namespace App\Filament\Resources\PrivacyPolicyPageResource\Pages;

use Filament\Actions;
use App\Models\PrivacyPolicyPage;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PrivacyPolicyPageResource;

class ListPrivacyPolicyPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = PrivacyPolicyPageResource::class;
    protected function getHeaderActions(): array
    {

        $homeExists = PrivacyPolicyPage::exists();

        return array_filter([

            !$homeExists ? Actions\CreateAction::make() : null,
            Actions\LocaleSwitcher::make(),
        ]);
    }
}
