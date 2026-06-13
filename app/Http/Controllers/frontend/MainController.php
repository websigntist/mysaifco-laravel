<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\Page;
use App\Models\backend\Tour;
use App\Models\backend\TourType;
use App\Models\backend\Explore;
use App\Models\backend\Faq;
use App\Models\backend\PopularSearch;
use App\Models\backend\Slider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController
{
    public function index()
    {
        $metaTitle = (string)(get_setting('site_title') ?? '');
        $metaKeywords = (string)(get_setting('site_keywords') ?? '');
        $metaDescription = (string)(get_setting('site_description') ?? '');

        $homePage = Page::query()->where('friendly_url', 'home')->where('status', 'published')->first();

        if ($homePage) {
            if (filled($homePage->meta_title)) {
                $metaTitle = (string)$homePage->meta_title;
            }
            if (filled($homePage->meta_keywords)) {
                $metaKeywords = (string)$homePage->meta_keywords;
            }
            if (filled($homePage->meta_description)) {
                $metaDescription = (string)$homePage->meta_description;
            }
        }

        /* slider data */
        $sliders = Slider::query()->where('status', 'Active')->orderBy('ordering', 'asc')->get();

        return view('frontend.pages.home', array_merge([
            'meta_title'       => $metaTitle,
            'meta_keywords'    => $metaKeywords,
            'meta_description' => $metaDescription,
            'sliders'          => $sliders,
        ], $this->exploreAndPopularSearchViewData($this->homeTourTypeId()), $this->homeFaqsViewData()));
    }

    public function all_categories()
    {
        $limitPerType = (int)request()->query('limit', 3);
        if (!in_array($limitPerType, [
            2,
            3,
            4,
            5,
            6
        ], true)) {
            $limitPerType = 3;
        }

        $page = Page::query()->where('friendly_url', 'all-categories')->where('status', 'published')->first();

        return view('frontend.pages.all-categories', array_merge([
            'tourSections'     => Tour::groupedByTourType($limitPerType),
            'toursPerType'     => $limitPerType,
            'page'             => $page,
            'pageContent'      => $page?->description,
            'meta_title'       => filled($page?->meta_title) ? $page->meta_title : 'All Tour Categories',
            'meta_keywords'    => (string)($page?->meta_keywords ?? ''),
            'meta_description' => (string)($page?->meta_description ?? ''),
        ], $this->exploreAndPopularSearchViewData($this->allCategoriesTourTypeId()), $this->allCategoriesFaqsViewData()));
    }

    /**
     * Tour type used for Explore / Popular Searches on the home page (Tour Types → Home, id 9).
     */
    protected function homeTourTypeId(): int
    {
        $id = TourType::query()->where('status', 'Active')->where(function ($query) {
            $query->where('id', 9)->orWhere('friendly_url', 'home');
        })->orderByRaw('id = 9 DESC')->value('id');

        return (int)($id ?? 9);
    }

    /**
     * Tour type for the all-tour-categories page (Tour Types → All Tour Categories, id 10).
     */
    protected function allCategoriesTourTypeId(): int
    {
        $id = TourType::query()->where('status', 'Active')->where(function ($query) {
            $query->where('id', 10)->orWhere('friendly_url', 'all-tour-categories')->orWhere('friendly_url', 'all-categories');
        })->orderByRaw('id = 10 DESC')->value('id');

        return (int)($id ?? 10);
    }

    /**
     * Resolve which tour_type_id drives Explore / Popular Searches for a CMS page slug.
     */
    protected function exploreTourTypeIdForPage(string $slug, Page $page): ?int
    {
        if ($this->isAllCategoriesPageSlug($slug)) {
            return $this->allCategoriesTourTypeId();
        }

        if (cms_page_description_has_include($page->description)) {
            $includeFile = cms_page_first_include_file($page->description);

            if ($includeFile === 'all-categories') {
                return $this->allCategoriesTourTypeId();
            }

            if ($includeFile === 'all-tours-packages') {
                $tourType = TourType::findActiveBySlug($slug);

                return $tourType ? (int)$tourType->id : null;
            }
        }

        return null;
    }

    protected function isAllCategoriesPageSlug(string $slug): bool
    {
        return in_array($slug, [
            'all-categories',
            'all-tour-categories'
        ], true);
    }

    /**
     * Explore block + popular search chips for a tour type (or site-wide when $tourTypeId is null).
     */
    protected function exploreAndPopularSearchViewData(?int $tourTypeId = null): array
    {
        $exploreQuery = Explore::query()->where('status', 'Active');
        $popularQuery = PopularSearch::query();

        if ($tourTypeId !== null) {
            $exploreQuery->where('tour_type_id', $tourTypeId);
            $popularQuery->where('tour_type_id', $tourTypeId);
        } else {
            $exploreQuery->whereNull('tour_type_id');
            $popularQuery->whereNull('tour_type_id');
        }

        $explore = $exploreQuery->orderBy('ordering')->orderByDesc('id')->first();

        $popularSearch = $popularQuery->orderByDesc('id')->first();

        $popularSearchItems = collect($popularSearch?->search_items ?? [])->map(fn(array $item) => trim((string)($item['title'] ?? '')))->filter()->values()->all();

        return [
            'explore'            => $explore,
            'popularSearch'      => $popularSearch,
            'popularSearchItems' => $popularSearchItems,
        ];
    }

    protected function tourPackagesViewData(TourType $tourType): array
    {
        $slug = (string)($tourType->friendly_url ?? '');

        $page = $slug !== '' ? Page::query()->where('friendly_url', $slug)->where('status', 'published')->first() : null;

        $pageContent = null;
        if ($page && filled($page->description)) {
            $pageContent = cms_page_render_editor_content($page->description);
            if (trim(strip_tags((string)$pageContent)) === '') {
                $pageContent = null;
            }
        }

        $bannerImageUrl = asset('assets/images/sliders/560650.webp');
        if ($page && filled($page->image)) {
            $bannerImageUrl = asset('assets/images/pages/' . ltrim($page->image, '/'));
        } elseif (filled($tourType->image)) {
            $bannerImageUrl = asset('assets/images/tour-types/' . ltrim($tourType->image, '/'));
        }

        return array_merge([
            'tourType'         => $tourType,
            'tours'            => Tour::publishedForTourType($tourType->title),
            'page'             => $page,
            'pageContent'      => $pageContent,
            'bannerImageUrl'   => $bannerImageUrl,
            'pageSlug'         => $slug,
            'meta_title'       => filled($page?->meta_title) ? $page->meta_title : (filled($tourType->meta_title) ? $tourType->meta_title : $tourType->title),
            'meta_keywords'    => (string)($page?->meta_keywords ?? $tourType->meta_keywords ?? ''),
            'meta_description' => (string)($page?->meta_description ?? $tourType->meta_description ?? ''),
        ], array_merge($this->exploreAndPopularSearchViewData((int)$tourType->id), $this->faqsForTourTypeViewData((int)$tourType->id)));
    }

    /**
     * FAQs assigned to the current tour type in admin.
     */
    protected function faqsForTourTypeViewData(int $tourTypeId, ?int $limit = null): array
    {
        return [
            'faqs' => Faq::activeForTourType($tourTypeId, $limit),
        ];
    }

    /** Home page: 5 FAQs (tour type id 9) + side image. */
    protected function homeFaqsViewData(): array
    {
        return array_merge($this->faqsForTourTypeViewData($this->homeTourTypeId(), 5), ['faqImage' => 'city.webp']);
    }

    /** All categories page: 8 FAQs (tour type id 10) + side image. */
    protected function allCategoriesFaqsViewData(): array
    {
        return array_merge($this->faqsForTourTypeViewData($this->allCategoriesTourTypeId(), 8), ['faqImage' => 'Intersect.webp']);
    }

    protected function pageDescriptionIncludesFile(?string $description, string $file): bool
    {
        $file = preg_replace('/[^a-zA-Z0-9_-]/', '', $file);

        if ($description === null || trim($description) === '' || $file === '') {
            return false;
        }

        return (bool)preg_match('/\[(?:include\s+file|include_file)=(["\'])' . preg_quote($file, '/') . '\1(?:\s[^\]]*)?\]/i', $description);
    }

    /**
     * CMS page by friendly_url with [include_file="filename"] shortcode support.
     * Loads resources/views/frontend/pages/{filename}.blade.php into page content.
     */
    public function show(string $slug)
    {
        $reserved = [
            'admin',
            'api',
            'send',
            'clearall',
            'update-pass',
        ];

        if (in_array(strtolower($slug), $reserved, true)) {
            throw new NotFoundHttpException();
        }

        $page = Page::query()->where('friendly_url', $slug)->where('status', 'published')->first();

        if (!$page) {
            throw new NotFoundHttpException();
        }

        $viewData = array_merge(cms_page_view_data($page), $this->exploreAndPopularSearchViewData($this->exploreTourTypeIdForPage($slug, $page)));

        $description = (string)($page->description ?? '');
        $includeFile = cms_page_first_include_file($description);

        if ($this->isAllCategoriesPageSlug($slug) || $includeFile === 'all-categories') {
            $limitPerType = (int)request()->query('limit', 3);
            if (!in_array($limitPerType, [
                2,
                3,
                4,
                5,
                6
            ], true)) {
                $limitPerType = 3;
            }
            $viewData = array_merge($viewData, $this->allCategoriesFaqsViewData(), [
                'tourSections' => Tour::groupedByTourType($limitPerType),
                'toursPerType' => $limitPerType,
            ]);
        }

        if ($this->pageDescriptionIncludesFile($description, 'all-tours-packages')) {
            $tourType = TourType::findActiveBySlug($slug);

            if ($tourType) {
                $viewData = array_merge($viewData, [
                    'tourType' => $tourType,
                    'tours'    => Tour::publishedForTourType($tourType->title),
                    'pageSlug' => $slug,
                ], $this->faqsForTourTypeViewData((int)$tourType->id));
                $viewData = array_merge($viewData, $this->exploreAndPopularSearchViewData((int)$tourType->id));
            } else {
                $viewData['tourType'] = null;
                $viewData['tours'] = collect();
                $viewData['pageSlug'] = $slug;
            }
        }

        $pageContent = do_shortcode($description, $viewData);
        $pageContent = trim($pageContent);
        $viewData['pageContent'] = $pageContent !== '' ? $pageContent : null;

        return view('frontend.pages.default', $viewData);
    }

    public function tourDetails()
    {
        $limitPerType = 3;
        $page = Page::query()->where('friendly_url', 'tour-details')->where('status', 'published')->first();

        return view('frontend.pages.tour-details', array_merge([
            'tourSections'     => Tour::groupedByTourType($limitPerType),
            'toursPerType'     => $limitPerType,
            'page'             => $page,
            'pageContent'      => $page?->description,
            'meta_title'       => filled($page?->meta_title) ? $page->meta_title : 'Tour Details',
            'meta_keywords'    => (string)($page?->meta_keywords ?? 'keyword mention here'),
            'meta_description' => (string)($page?->meta_description ?? 'Lorem ipsum dolor sit amet.'),
        ], $this->exploreAndPopularSearchViewData($this->allCategoriesTourTypeId()), $this->allCategoriesFaqsViewData()));
    }

}
