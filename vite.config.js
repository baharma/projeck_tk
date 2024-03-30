import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/front.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/front.js',
            ],
            refresh: true,
        }),
    ],
});
