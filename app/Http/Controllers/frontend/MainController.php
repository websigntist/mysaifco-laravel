<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\PagesApiController;
use App\Models\backend\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function about()
    {
        // Fetch "about-us" page data from the API
        $pageData = null;

        try {
            // Call the Pages API Controller directly (better for internal use)
            $apiController = new PagesApiController();
            $request = new Request();
            $request->headers->set('X-API-KEY', env('API_CONTACT_KEY'));

            $response = $apiController->showBySlug($request, 'about-us');
            $result = json_decode($response->getContent(), true);

            if (isset($result['success']) && $result['success']) {
                $pageData = $result['data'];

                Log::info('About page data fetched from API', [
                    'page_id' => $pageData['id'],
                    'title' => $pageData['page_title']
                ]);
            } else {
                Log::warning('Failed to fetch about page from API', [
                    'response' => $result
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching about page from API', [
                'error' => $e->getMessage()
            ]);
        }

        return view('frontend.pages.about-us', [
            'pageData'         => $pageData,
            'meta_title'       => $pageData['meta']['title'] ?? "meta title mention here",
            'meta_keywords'    => $pageData['meta']['keywords'] ?? 'meta keywords mention here',
            'meta_description' => $pageData['meta']['description'] ?? 'meta description mention here',
        ]);
    }

    public function patches()
        {
            // Fetch "about-us" page data from the API
            $pageData = null;

            return view('frontend.pages.custom-embroidered-patches-maker-in-usa', [
                'pageData'         => $pageData,
                'meta_title'       => $pageData['meta']['title'] ?? "Custom Embroidered Patches Maker in USA",
                'meta_keywords'    => $pageData['meta']['keywords'] ?? 'meta keywords mention here',
                'meta_description' => $pageData['meta']['description'] ?? 'meta description mention here',
            ]);
        }

}
