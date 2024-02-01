<?php

namespace App\Providers\Filament;

use App\Filament\Resources\ChatResource;
use App\Filament\Resources\SettingsResource;
use App\Filament\Resources\TextResource;
use App\Filament\Widgets\ChatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\Widgets;
use FilipFonal\FilamentLogManager\FilamentLogManager;
use Hasnayeen\Themes\Http\Middleware\SetTheme;
use Hasnayeen\Themes\ThemesPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        FilamentView::registerRenderHook(
            'panels::global-search.after',
            fn (): string => Blade::render('<livewire:bot.control key=\'bot-control\' />')
        );

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Gray,
            ])
            ->favicon(asset('images/favicon.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                ChatsOverview::class,
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
                SetTheme::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('10s')
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentLogManager::make(),
                ThemesPlugin::make(),
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make(__('navigation.general'))
                        ->items([
                            ...Pages\Dashboard::getNavigationItems(),
                            ...SettingsResource::getNavigationItems(),
                            ...TextResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make(__('navigation.telegram'))
                        ->items([
                            ...ChatResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make(__('navigation.system'))
                        ->items([
                            NavigationItem::make('Telescope')
                                ->url('/telescope')
                                ->icon('heroicon-o-magnifying-glass'),
                            NavigationItem::make('Log Viewer')
                                ->url('/log-viewer')
                                ->icon('heroicon-o-document-text'),

                        ]),
                ]);
            });
    }
}
