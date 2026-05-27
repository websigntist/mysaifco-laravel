<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

if (!function_exists('do_shortcode')) {
    /**
     * Process shortcodes in CMS HTML (pages, static blocks, etc.).
     *
     * Supported: [include file="all-categories"]
     */
    function do_shortcode(?string $content): string
    {
        if ($content === null || $content === '') {
            return '';
        }

        return (string) preg_replace_callback(
            '/\[include\s+file=(["\'])([a-zA-Z0-9_-]+)\1(?:\s[^\]]*)?\]/i',
            static function (array $matches): string {
                return shortcode_include_render($matches[2]);
            },
            $content
        );
    }
}

if (!function_exists('cms_page_description_has_include')) {
    /**
     * Whether the CMS description contains an [include file="..."] shortcode.
     */
    function cms_page_description_has_include(?string $description): bool
    {
        if ($description === null || trim($description) === '') {
            return false;
        }

        return (bool) preg_match(
            '/\[include\s+file=(["\'])[a-zA-Z0-9_-]+\1(?:\s[^\]]*)?\]/i',
            $description
        );
    }
}

if (!function_exists('cms_page_first_include_file')) {
    /**
     * First [include file="..."] slug in the CMS description.
     */
    function cms_page_first_include_file(?string $description): ?string
    {
        if ($description === null || trim($description) === '') {
            return null;
        }

        if (preg_match(
            '/\[include\s+file=(["\'])([a-zA-Z0-9_-]+)\1(?:\s[^\]]*)?\]/i',
            $description,
            $matches
        )) {
            return shortcode_sanitize_file_slug($matches[2]);
        }

        return null;
    }
}

if (!function_exists('cms_page_strip_include_shortcodes')) {
    /**
     * Editor HTML with all [include file="..."] shortcodes removed.
     */
    function cms_page_strip_include_shortcodes(?string $description): string
    {
        if ($description === null || $description === '') {
            return '';
        }

        return trim((string) preg_replace(
            '/\[include\s+file=(["\'])[a-zA-Z0-9_-]+\1(?:\s[^\]]*)?\]/i',
            '',
            $description
        ));
    }
}

if (!function_exists('cms_page_render_editor_content')) {
    /**
     * Process editor HTML only (excludes include shortcodes).
     */
    function cms_page_render_editor_content(?string $description): string
    {
        return do_shortcode($description);
    }
}

if (!function_exists('cms_page_includes_only_file')) {
    /**
     * If the page description is only a single [include file="..."] shortcode, return the file slug.
     */
    function cms_page_includes_only_file(?string $description): ?string
    {
        if ($description === null || trim($description) === '') {
            return null;
        }

        $plain = trim(strip_tags($description));

        if (preg_match('/^\[include\s+file=(["\'])([a-zA-Z0-9_-]+)\1\]\s*$/i', $plain, $matches)) {
            return shortcode_sanitize_file_slug($matches[2]);
        }

        if (preg_match('/^\[include\s+file=(["\'])([a-zA-Z0-9_-]+)\1\]\s*$/i', trim($description), $matches)) {
            return shortcode_sanitize_file_slug($matches[2]);
        }

        return null;
    }
}

if (!function_exists('shortcode_sanitize_file_slug')) {
    function shortcode_sanitize_file_slug(string $file): string
    {
        return (string) preg_replace('/[^a-zA-Z0-9_-]/', '', $file);
    }
}

if (!function_exists('shortcode_include_view_name')) {
    /**
     * Resolve Blade view for an include file slug.
     * Prefers content partials: frontend.pages.includes.{file}
     * Falls back to: frontend.pages.{file}
     */
    function shortcode_include_view_name(string $file): ?string
    {
        $file = shortcode_sanitize_file_slug($file);

        if ($file === '') {
            return null;
        }

        $partial = "frontend.pages.includes.{$file}";
        if (View::exists($partial)) {
            return $partial;
        }

        $full = "frontend.pages.{$file}";
        if (View::exists($full)) {
            return $full;
        }

        return null;
    }
}

if (!function_exists('shortcode_include_is_full_page_view')) {
    function shortcode_include_is_full_page_view(string $viewName): bool
    {
        return str_starts_with($viewName, 'frontend.pages.')
            && ! str_starts_with($viewName, 'frontend.pages.includes.');
    }
}

if (!function_exists('shortcode_include_render')) {
    /**
     * Render an included Blade file for use inside page HTML.
     */
    function shortcode_include_render(string $file, array $data = []): string
    {
        $file = shortcode_sanitize_file_slug($file);

        if ($file === '') {
            return shortcode_include_error($file, 'Invalid file name.');
        }

        $viewName = shortcode_include_view_name($file);

        if ($viewName === null) {
            return shortcode_include_error($file, 'Blade file not found in resources/views/frontend/pages/ or pages/includes/.');
        }

        if (shortcode_include_is_full_page_view($viewName)) {
            $includeView = 'frontend.pages.includes.' . $file;
            if (View::exists($includeView)) {
                $viewName = $includeView;
            } else {
                return shortcode_include_error(
                    $file,
                    'Add resources/views/frontend/pages/includes/' . $file . '.blade.php for [include file="' . $file . '"].'
                );
            }
        }

        try {
            return view($viewName, $data)->render();
        } catch (\Throwable $e) {
            Log::error('Shortcode [include] render failed', [
                'file'  => $file,
                'view'  => $viewName,
                'error' => $e->getMessage(),
            ]);

            return shortcode_include_error($file, 'Failed to render the included view.');
        }
    }
}

if (!function_exists('shortcode_include_error')) {
    function shortcode_include_error(string $file, string $message): string
    {
        if (! config('app.debug')) {
            return '';
        }

        return '<div class="rounded-lg border border-amber-300 bg-amber-50 px-4 py-3 text-sm text-amber-900">'
            . '<strong>Include shortcode error</strong> (' . e($file) . '): '
            . e($message)
            . '</div>';
    }
}

if (!function_exists('cms_page_view_data')) {
    /**
     * Shared view data when rendering a CMS page on the frontend.
     */
    function cms_page_view_data(\App\Models\backend\Page $page): array
    {
        $imageUrl = $page->image
            ? asset('assets/images/pages/' . ltrim($page->image, '/'))
            : null;

        return [
            'page'             => $page,
            'cmsPage'          => $page,
            'meta_title'       => filled($page->meta_title) ? $page->meta_title : ($page->page_title ?? $page->menu_title),
            'meta_keywords'    => (string) ($page->meta_keywords ?? ''),
            'meta_description' => (string) ($page->meta_description ?? ''),
            'pageImageUrl'     => $imageUrl,
        ];
    }
}
