<?php

namespace App\Observers;

use App\Models\RealisationsPage;
use Illuminate\Support\Facades\Storage;

class RealisationsPageObserver
{
    /**
     * Handle the RealisationsPage "created" event.
     */
    public function created(RealisationsPage $realisationsPage): void
    {
        //
    }

    /**
     * Handle the RealisationsPage "updated" event.
     */
    public function updated(RealisationsPage $realisationsPage): void
    {
        if ($realisationsPage->isDirty('hero_image')) {
            Storage::disk('public')->delete($realisationsPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the RealisationsPage "deleted" event.
     */
    public function deleted(RealisationsPage $realisationsPage): void
    {
        if (!is_null($realisationsPage->hero_image)) {
            Storage::disk('public')->delete($realisationsPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the RealisationsPage "restored" event.
     */
    public function restored(RealisationsPage $realisationsPage): void
    {
        //
    }

    /**
     * Handle the RealisationsPage "force deleted" event.
     */
    public function forceDeleted(RealisationsPage $realisationsPage): void
    {
        //
    }
}
