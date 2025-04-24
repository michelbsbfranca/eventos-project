import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                'resources/views/**',
                'resources/js/**',
                'resources/css/**',
            ],
        }),
    ],
    build: {
        rollupOptions: {
            external: ['**/*.blade.php'],
        },
    },
});
