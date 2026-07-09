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
    // Forzamos rutas relativas sin host
    base: '',
    server: {
        host: '0.0.0.0', // Permite que responda dentro del contenedor de Railway
        port: 8080,      // Lo alineamos al puerto de red que dio Railway
        strictPort: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});