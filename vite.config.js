import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/css/autoscroll.css',
                    'resources/js/section2-animate.js',
                    'resources/js/autoscroll.js',
                    'resources/js/consumer_products.js'],
            refresh: true,
        }),
        tailwindcss(),
                vue(),

    ],
});
