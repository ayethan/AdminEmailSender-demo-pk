<?php

namespace Atk\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/contact.php' => config_path('contact.php'),
        ], 'contact-config');
        // $this->publishes([
        //     __DIR__.'/../resources/views' => resource_path('views/vendor/contact'),
        // ], 'contact-views');
        // $this->publishes([
        //     __DIR__.'/../database/migrations' => database_path('migrations'),
        // ], 'contact-migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contact');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
 