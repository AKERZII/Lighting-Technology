import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ mode }) => {
    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            tailwindcss(),
        ],
        server: {
            hmr: mode === 'production' ? { protocol: 'wss' } : true,
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
    };
});