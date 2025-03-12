<?php

namespace App\Observers;

use App\Models\PrivacyPolicyPage;
use Illuminate\Support\Facades\Storage;

class PrivacyPolicyPageObserver
{
    /**
     * Handle the PrivacyPolicyPage "created" event.
     */
    public function created(PrivacyPolicyPage $privacyPolicyPage): void
    {
        //
    }

    /**
     * Handle the PrivacyPolicyPage "updated" event.
     */
    public function updated(PrivacyPolicyPage $privacyPolicyPage): void
    {
        if ($privacyPolicyPage->isDirty('hero_image')) {
            Storage::disk('public')->delete($privacyPolicyPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the PrivacyPolicyPage "deleted" event.
     */
    public function deleted(PrivacyPolicyPage $privacyPolicyPage): void
    {
        if (!is_null($privacyPolicyPage->hero_image)) {
            Storage::disk('public')->delete($privacyPolicyPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the PrivacyPolicyPage "restored" event.
     */
    public function restored(PrivacyPolicyPage $privacyPolicyPage): void
    {
        //
    }

    /**
     * Handle the PrivacyPolicyPage "force deleted" event.
     */
    public function forceDeleted(PrivacyPolicyPage $privacyPolicyPage): void
    {
        //
    }
}
