<?php

namespace App\View\Composers;

use App\Http\Controllers\frontend\TestimonialsController;
use App\Models\backend\Testimonial;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class TestimonialsComposer
{
    public function compose(View $view): void
    {
        if ($view->offsetExists('testimonialItems')) {
            return;
        }

        $rows = $view->offsetExists('testimonials')
            ? $this->normalizeRows($view->getData()['testimonials'])
            : TestimonialsController::forComponent();

        $view->with('testimonialItems', $rows->map(function ($item) {
            if ($item instanceof Testimonial) {
                return $item->toFrontendCard();
            }

            return $item;
        })->values()->all());
    }

    protected function normalizeRows(mixed $testimonials): Collection
    {
        if ($testimonials instanceof Collection) {
            return $testimonials;
        }

        if (is_array($testimonials)) {
            return collect($testimonials);
        }

        return collect();
    }
}
