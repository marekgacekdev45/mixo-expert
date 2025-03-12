<?php

namespace App\Observers;

use App\Models\Offer;
use Illuminate\Support\Facades\Storage;

class OfferObserver
{
    /**
     * Handle the Offer "created" event.
     */
    public function created(Offer $offer): void
    {
        //
    }

    /**
     * Handle the Offer "updated" event.
     */
    public function updated(Offer $offer): void
    {
        if ($offer->isDirty('icon')) {
            Storage::disk('public')->delete($offer->getOriginal('icon'));
        }
        if ($offer->isDirty('thumbnail')) {
            Storage::disk('public')->delete($offer->getOriginal('thumbnail'));
        }
       
    }

    /**
     * Handle the Offer "deleted" event.
     */
    public function deleted(Offer $offer): void
    {
        if ($offer->isDirty('offer')) {
            Storage::disk('public')->delete($offer->getOriginal('offer'));
        }
        if ($offer->isDirty('icon')) {
            Storage::disk('public')->delete($offer->getOriginal('icon'));
        }
    }

    /**
     * Handle the Offer "restored" event.
     */
    public function restored(Offer $offer): void
    {
        //
    }

    /**
     * Handle the Offer "force deleted" event.
     */
    public function forceDeleted(Offer $offer): void
    {
        //
    }
}
