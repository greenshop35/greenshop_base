import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: '0.0.0.0', // यह सर्वर पर एक्सेस के लिए ज़रूरी है
        hmr: {
            host: 'greenshop.org.in' // आपकी अपनी वेबसाइट का नाम
        },
    },
});