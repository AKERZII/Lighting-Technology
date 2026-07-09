import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    // Forzamos a Vite a usar rutas base relativas para que no invente "http" o "https"
    base: '', 
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});