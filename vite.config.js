import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ command, mode }) => {
    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            tailwindcss(),
        ],
        server: {
            // Si está en producción (Railway), usa 'wss'. Si es local, usa el estándar.
            hmr: mode === 'production' ? { protocol: 'wss' } : true,
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
    };
});