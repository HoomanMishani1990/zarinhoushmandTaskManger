<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Move the view composer to after the view service provider has been booted
        $this->app->booted(function () {
            View::composer('layouts.partials.sidebar', function ($view) {
                $view->with('menu_items', $this->getMenuItems());
            });
        });
    }

    /**
     * Get menu items array
     */
    protected function getMenuItems()
    {
        return [
            [
                'title' => 'داشبورد',
                'route' => 'dashboard',
                'icon' => 'bx-home-circle',
            ],
            [
                'title' => 'پروژه‌ها',
                'route' => 'projects.index',
                'icon' => 'bx-collection',
            ],
            [
                'title' => 'وظایف',
                'route' => 'tasks.index',
                'icon' => 'bx-check-square',
            ]
            // Add more menu items as needed
        ];
    }
} 