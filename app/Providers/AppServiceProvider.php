<?php

namespace App\Providers;

use App\Models\ContactPage;
use App\Models\Home;
use App\Models\Offer;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\GalleryPage;
use App\Models\Realisation;
use App\Observers\ContactPageObserver;
use App\Observers\HomeObserver;
use App\Models\RealisationsPage;
use App\Observers\OfferObserver;
use App\Models\PrivacyPolicyPage;
use App\Observers\GalleryObserver;
use Illuminate\Support\Facades\View;
use App\Observers\GalleryPageObserver;
use App\Observers\RealisationObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\RealisationsPageObserver;
use App\Observers\PrivacyPolicyPageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $home = Home::first(['name', 'logo', 'address', 'city', 'phone', 'email', 'google_link', 'google_map', 'keywords', 'og_image', 'scripts_head_top', 'scripts_head_bottom', 'scripts_body_top','hero_background','nip']);
        $socials = Social::all();
        $offers = Offer::select('title', 'slug')->get();

        View::share('home', $home);
        View::share('socials', $socials);
        View::share('offers', $offers);


        // home
        Home::observe(HomeObserver::class);

        // offers
        Offer::observe(OfferObserver::class);

        //gallery
        GalleryPage::observe(GalleryPageObserver::class);
        Gallery::observe(GalleryObserver::class);

        // realisations
        RealisationsPage::observe(RealisationsPageObserver::class);
        Realisation::observe(RealisationObserver::class);

        // contact
        ContactPage::observe(ContactPageObserver::class);

        // privacy policy
        PrivacyPolicyPage::observe(PrivacyPolicyPageObserver::class);
    }
}
