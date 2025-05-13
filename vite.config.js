import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true, // Ini agar Vite tersedia di jaringan, bukan hanya localhost
        port: process.env.PORT || 3000, // Gunakan variabel PORT atau fallback ke 3000
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
