<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class PagesApiController extends Controller
{
    /**
     * Test endpoint to verify API is working
     */
    public function test()
    {
        return response()->json([
            'success' => true,
            'message' => 'Pages API is working!',
            'timestamp' => now()->toDateTimeString(),
            'endpoints' => [
                'GET /api/v1/pages' => 'Get all published pages',
                'GET /api/v1/pages/{id}' => 'Get single page by ID',
                'GET /api/v1/pages/slug/{slug}' => 'Get single page by friendly URL',
            ]
        ], 200);
    }

    /**
     * Get all published pages
     */
    public function index(Request $request)
    {
        try {
            // Verify API key
            if (!$this->verifyApiKey($request)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or missing API key'
                ], 401);
            }

            // Get only published pages (not soft deleted)
            $pages = Page::where('status', 'published')
                ->orderBy('ordering', 'asc')
                ->orderBy('menu_title', 'asc')
                ->get();

            // Transform data for API response
            $pagesData = $pages->map(function ($page) {
                return $this->formatPageData($page);
            });

            // Log the API request
            Log::info('Pages API - All Pages Requested', [
                'ip' => $request->ip(),
                'total_pages' => $pagesData->count(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pages retrieved successfully',
                'total' => $pagesData->count(),
                'data' => $pagesData
            ], 200);

        } catch (\Exception $e) {
            Log::error('Pages API Error - Index', [
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching pages'
            ], 500);
        }
    }

    /**
     * Get single page by ID
     */
    public function show(Request $request, $id)
    {
        try {
            // Verify API key
            if (!$this->verifyApiKey($request)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or missing API key'
                ], 401);
            }

            // Find page by ID
            $page = Page::where('id', $id)
                ->where('status', 'published')
                ->first();

            if (!$page) {
                return response()->json([
                    'success' => false,
                    'message' => 'Page not found'
                ], 404);
            }

            // Log the API request
            Log::info('Pages API - Single Page Requested', [
                'page_id' => $id,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Page retrieved successfully',
                'data' => $this->formatPageData($page)
            ], 200);

        } catch (\Exception $e) {
            Log::error('Pages API Error - Show', [
                'page_id' => $id,
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the page'
            ], 500);
        }
    }

    /**
     * Get single page by friendly URL (slug)
     */
    public function showBySlug(Request $request, $slug)
    {
        try {
            // Verify API key
            if (!$this->verifyApiKey($request)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or missing API key'
                ], 401);
            }

            // Find page by friendly URL
            $page = Page::where('friendly_url', $slug)
                ->where('status', 'published')
                ->first();

            if (!$page) {
                return response()->json([
                    'success' => false,
                    'message' => 'Page not found'
                ], 404);
            }

            // Log the API request
            Log::info('Pages API - Page by Slug Requested', [
                'slug' => $slug,
                'page_id' => $page->id,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Page retrieved successfully',
                'data' => $this->formatPageData($page)
            ], 200);

        } catch (\Exception $e) {
            Log::error('Pages API Error - Show by Slug', [
                'slug' => $slug,
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the page'
            ], 500);
        }
    }

    /**
     * Get menu pages only (show_in_menu = 1)
     */
    public function menu(Request $request)
    {
        try {
            // Verify API key
            if (!$this->verifyApiKey($request)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or missing API key'
                ], 401);
            }

            // Get only menu pages
            $pages = Page::where('status', 'published')
                ->where('show_in_menu', '1')
                ->orderBy('ordering', 'asc')
                ->orderBy('menu_title', 'asc')
                ->get();

            // Transform data for API response (menu only - minimal data)
            $menuData = $pages->map(function ($page) {
                return [
                    'id' => $page->id,
                    'menu_title' => $page->menu_title,
                    'friendly_url' => $page->friendly_url,
                    'parent_id' => $page->parent_id,
                    'ordering' => $page->ordering,
                ];
            });

            // Log the API request
            Log::info('Pages API - Menu Requested', [
                'ip' => $request->ip(),
                'total_items' => $menuData->count(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Menu retrieved successfully',
                'total' => $menuData->count(),
                'data' => $menuData
            ], 200);

        } catch (\Exception $e) {
            Log::error('Pages API Error - Menu', [
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching menu'
            ], 500);
        }
    }

    /**
     * Verify API Key
     */
    private function verifyApiKey(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');
        $validApiKey = env('API_CONTACT_KEY'); // Using same API key

        return $apiKey === $validApiKey;
    }

    /**
     * Format page data for API response
     */
    private function formatPageData($page)
    {
        // Build full image URL if image exists
        $imageUrl = null;
        if ($page->image) {
            $imageUrl = url('assets/images/pages/' . $page->image);
        }

        return [
            'id' => $page->id,
            'page_title' => $page->page_title ?? $page->menu_title,
            'show_title' => $page->show_title == '1',
            'sub_title' => $page->sub_title,
            'friendly_url' => $page->friendly_url,
            'description' => $page->description,
            'image' => $page->image,
            'image_url' => $imageUrl,
            'meta' => [
                'title' => $page->meta_title,
                'keywords' => $page->meta_keywords,
                'description' => $page->meta_description,
            ],
        ];
    }
}

