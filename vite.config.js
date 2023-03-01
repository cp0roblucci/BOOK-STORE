import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/assets/fontawesome-free-6.3.0-web/css/all.min.css'],
            refresh: true,
        }),
    ],
});
