// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'],
//             refresh: true,
//         }),
//     ],
// });

import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // Your main CSS file
                'resources/js/app.js',    // Your main JS file
                'resources/js/bootstrap.js',  // If you're using Bootstrap
                'resources/assets/vendor/fonts/remixicon/remixicon.scss', // If you're using remixicon
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',  // Allow access from any IP address
        port: 5173,       // Default Vite dev server port, adjust if needed
    },
    build: {
        outDir: 'public/build', // Output build directory
        manifest: true,         // Generate a manifest for assets
    }
});
