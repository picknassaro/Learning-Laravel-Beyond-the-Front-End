import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/auth-form.css",
            ],
            refresh: [
                "resources/css/**/*",
                "resources/js/**/*",
                "resources/views/**/*",
                "routes/**/*",
            ],
        }),
    ],
    server: {
        host: "thirtydaystolearnlaravel.laracasts.test",
        port: 8084,
        hmr: {
            host: "thirtydaystolearnlaravel.laracasts.test",
            port: 8084,
        },
    },
});
