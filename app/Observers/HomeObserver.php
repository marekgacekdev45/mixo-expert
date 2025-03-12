<?php

namespace App\Observers;

use App\Models\Home;
use Illuminate\Support\Facades\Storage;

class HomeObserver
{
    /**
     * Handle the Home "created" event.
     */
    public function created(Home $home): void
    {
        //
    }

    /**
     * Handle the Home "updated" event.
     */
    public function updated(Home $home): void
    {
        if ($home->isDirty('og_image')) {
            Storage::disk('public')->delete($home->getOriginal('og_image'));
        }
        
        if ($home->isDirty('logo')) {
            Storage::disk('public')->delete($home->getOriginal('logo'));
        }

        if ($home->isDirty('hero_image')) {
            Storage::disk('public')->delete($home->getOriginal('hero_image'));
        }

        if ($home->isDirty('hero_background')) {
            Storage::disk('public')->delete($home->getOriginal('hero_background'));
        }

        if ($home->isDirty('about_image')) {
            Storage::disk('public')->delete($home->getOriginal('about_image'));
        }

        if ($home->isDirty('about_background')) {
            Storage::disk('public')->delete($home->getOriginal('about_background'));
        }

        if ($home->isDirty('realisations_image')) {
            Storage::disk('public')->delete($home->getOriginal('realisations_image'));
        }
        if ($home->isDirty('realisations_background')) {
            Storage::disk('public')->delete($home->getOriginal('realisations_background'));
        }

    }

    /**
     * Handle the Home "deleted" event.
     */
    public function deleted(Home $home): void
    {
        if (!is_null($home->og_image)) {
            Storage::disk('public')->delete($home->getOriginal('og_image'));
        }
       
        if (!is_null($home->logo)) {
            Storage::disk('public')->delete($home->getOriginal('logo'));
        }
       
        if (!is_null($home->hero_image)) {
            Storage::disk('public')->delete($home->getOriginal('hero_image'));
        }
       
        if (!is_null($home->hero_background)) {
            Storage::disk('public')->delete($home->getOriginal('hero_background'));
        }
       
        if (!is_null($home->about_image)) {
            Storage::disk('public')->delete($home->getOriginal('about_image'));
        }
       
        if (!is_null($home->about_background)) {
            Storage::disk('public')->delete($home->getOriginal('about_background'));
        }
       
        if (!is_null($home->realisations_image)) {
            Storage::disk('public')->delete($home->getOriginal('realisations_image'));
        }
       
        if (!is_null($home->realisations_background)) {
            Storage::disk('public')->delete($home->getOriginal('realisations_background'));
        }
    }

    /**
     * Handle the Home "restored" event.
     */
    public function restored(Home $home): void
    {
        //
    }

    /**
     * Handle the Home "force deleted" event.
     */
    public function forceDeleted(Home $home): void
    {
        //
    }
}
