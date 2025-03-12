<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Blade;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\Support\Facades\FilamentView;
use Filament\SpatieLaravelTranslatablePlugin;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('studio')
            ->login()
            ->passwordReset()
            ->sidebarCollapsibleOnDesktop()
            ->favicon('/favicon/favicon.ico')
            ->brandLogo('/assets/logo.png')
            ->brandLogoHeight(fn() => auth()->check() ? '40px' : '70px')
            ->colors([
                'primary' => Color::hex('#d6c78e'),
                'gray' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Strona główna')
                    ->icon('lucide-home')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Oferty')
                    ->icon('lucide-circle-dollar-sign')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Realizacje')
                    ->icon('lucide-sparkles')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Galeria')
                    ->icon('lucide-camera')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Kontakt')
                    ->icon('lucide-phone')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Polityka prywatności')
                    ->icon('lucide-sticky-note')
                    ->collapsed(),


            ])
            ->plugin(SpatieLaravelTranslatablePlugin::make()->defaultLocales(['pl', 'sk']),);
    }

    public function register(): void
    {
        parent::register();
        FilamentView::registerRenderHook('panels::body.end', fn(): string => Blade::render("@vite('resources/js/app.js')"));
    }
}
