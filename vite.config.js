import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
    theme: {
        extend: {
            colors: {
                primary: "#193a66",
                secondary: "#3b82f6",
            },
            fontFamily: {
                sans: ["Outfit", "sans-serif"],
            },
        },
    },
});
