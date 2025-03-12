<?php

namespace App\Observers;

use App\Models\GalleryPage;
use Illuminate\Support\Facades\Storage;

class GalleryPageObserver
{
    /**
     * Handle the GalleryPage "created" event.
     */
    public function created(GalleryPage $galleryPage): void
    {
        //
    }

    /**
     * Handle the GalleryPage "updated" event.
     */
    public function updated(GalleryPage $galleryPage): void
    {
        if ($galleryPage->isDirty('hero_image')) {
            Storage::disk('public')->delete($galleryPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the GalleryPage "deleted" event.
     */
    public function deleted(GalleryPage $galleryPage): void
    {
        if (!is_null($galleryPage->hero_image)) {
            Storage::disk('public')->delete($galleryPage->getOriginal('hero_image'));
        }
    }

    /**
     * Handle the GalleryPage "restored" event.
     */
    public function restored(GalleryPage $galleryPage): void
    {
        //
    }

    /**
     * Handle the GalleryPage "force deleted" event.
     */
    public function forceDeleted(GalleryPage $galleryPage): void
    {
        //
    }
}
