<?php

namespace App\Providers\Filament;

use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Green,
                'secondary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'))
            ->discoverPages(in: app_path('Filament/Pages'))
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                Authenticate::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandName('سنابل الخير')
            ->renderHook(
                'panels::head.end',
                fn (): string => '<style>
                    body {
                        font-family: "Cairo", "Tajawal", sans-serif;
                        direction: rtl;
                    }
                    .fi-ta {
                        text-align: right !important;
                    }
                    .fi-ml-2 {
                        margin-left: 0.5rem;
                    }
                    .fi-mr-2 {
                        margin-right: 0.5rem;
                    }
                </style>'
            )
            ->navigationGroups([
                'إدارة المحتوى',
                'إدارة التبرعات',
                'إدارة المتطوعين',
                'الإعدادات',
            ])
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label('الملف الشخصي')
                    ->url(fn (): string => route('filament.admin.pages.profile'))
                    ->icon('heroicon-m-user-circle'),
            ]);
    }
}
