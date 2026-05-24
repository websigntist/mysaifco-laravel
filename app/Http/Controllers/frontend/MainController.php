<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\PagesApiController;
use App\Models\backend\Page;
use App\Models\backend\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController
{

    public function index()
    {
        $metaTitle = (string) (get_setting('site_title') ?? '');
        $metaKeywords = (string) (get_setting('site_keywords') ?? '');
        $metaDescription = (string) (get_setting('site_description') ?? '');

        $homePage = Page::query()
            ->where('friendly_url', 'home')
            ->where('status', 'published')
            ->first();

        if ($homePage) {
            if (filled($homePage->meta_title)) {
                $metaTitle = (string) $homePage->meta_title;
            }
            if (filled($homePage->meta_keywords)) {
                $metaKeywords = (string) $homePage->meta_keywords;
            }
            if (filled($homePage->meta_description)) {
                $metaDescription = (string) $homePage->meta_description;
            }
        }

        return view('frontend.pages.home', [
            'meta_title'       => $metaTitle,
            'meta_keywords'    => $metaKeywords,
            'meta_description' => $metaDescription,
        ]);
    }

    /**
     * Tours grouped by active tour types (limit per type from ?limit=2|3|…).
     */
    protected function allCategoriesTourViewData(): array
    {
        $limitPerType = (int) request()->query('limit', 3);
        if (! in_array($limitPerType, [2, 3, 4, 5, 6], true)) {
            $limitPerType = 3;
        }

        return [
            'tourSections' => Tour::groupedByTourType($limitPerType),
            'toursPerType' => $limitPerType,
        ];
    }
    /**
     * CMS page by friendly_url (slug). Supports [include file="page-name"] in description.
     */
    public function show(string $slug)
    {
        $reserved = ['admin', 'api', 'send', 'clearall', 'update-pass'];

        if (in_array(strtolower($slug), $reserved, true)) {
            throw new NotFoundHttpException();
        }

        $page = Page::query()
            ->where('friendly_url', $slug)
            ->where('status', 'published')
            ->first();

        if (! $page) {
            throw new NotFoundHttpException();
        }

        $viewData = cms_page_view_data($page);

        if (cms_page_description_has_include($page->description)) {
            $includeFile = cms_page_first_include_file($page->description);
            $viewData['pageContent'] = cms_page_render_editor_content($page->description);
            $viewData['includeFile'] = $includeFile;

            $viewName = $includeFile !== null
                ? shortcode_include_view_name($includeFile)
                : null;

            // frontend.pages.{name} → full page + optional editor content above it
            if ($viewName !== null && shortcode_include_is_full_page_view($viewName)) {
                if ($includeFile === 'all-categories') {
                    $viewData = array_merge($viewData, $this->allCategoriesTourViewData());
                }

                return view($viewName, $viewData);
            }

            // includes/{name}.blade.php → default shell + content + inline partial
            return view('frontend.pages.combined', $viewData);
        }

        // Editor content only → default layout
        $viewData['pageContent'] = do_shortcode($page->description);

        return view('frontend.pages.default', $viewData);
    }

}
