<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\Testimonial;
use Illuminate\Support\Collection;

class TestimonialsController
{
    /**
     * Active testimonials for the frontend reviews component.
     */
    public static function forComponent(): Collection
    {
        return Testimonial::forFrontend();
    }
}
