import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // ← add this

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/backend/css/app.css',
                'resources/assets/frontend/css/app.css',

                'resources/assets/backend/js/app.js',
                'resources/assets/frontend/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(), // ← add this
    ],
});
