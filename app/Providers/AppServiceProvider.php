<?php

namespace App\Providers;

use App\View\Composers\TestimonialsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Self-heal runtime framework directories. Git cannot track empty folders,
        // so a deploy that rebuilds the tree can leave storage/framework/views missing,
        // which makes the Blade compiler throw "Please provide a valid cache path."
        foreach ([
            storage_path('framework/views'),
            storage_path('framework/cache/data'),
            storage_path('framework/sessions'),
            base_path('bootstrap/cache'),
        ] as $path) {
            if (! is_dir($path)) {
                @mkdir($path, 0775, true);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.components.testimonials', TestimonialsComposer::class);
    }
}
