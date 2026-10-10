import { defineConfig, loadEnv } from "vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig(({ mode }) => {
    const envDir = "../../../";

    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        build: {
            emptyOutDir: true,
            minify: "esbuild",
            cssCodeSplit: true,
            rollupOptions: {
                output: {
                    manualChunks(id) {
                        if (/node_modules\/(@vue|vue)\//.test(id)) {
                            return "vue";
                        }

                        if (/node_modules\/(@vee-validate|vee-validate)\//.test(id)) {
                            return "veeValidate";
                        }

                        if (/node_modules\/(axios|mitt)\//.test(id)) {
                            return "vendor";
                        }
                    }
                }
            }
        },

        envDir,

        resolve: {
            alias: {
                "@shop": path.resolve(__dirname, "../../Webkul/Shop/src/Resources/assets"),
            },
        },

        server: {
            host: process.env.VITE_HOST || "localhost",
            port: process.env.VITE_PORT || 5173,
            cors: true,
            fs: {
                allow: ["../../"],
            },
        },

        plugins: [
            vue(),

            tailwindcss(),

            laravel({
                hotFile: "../../../public/shop-sonya-vite.hot",
                publicDirectory: "../../../public",
                buildDirectory: "themes/shop/sonya/build",
                input: [
                    "src/Resources/assets/css/app.css",
                    "src/Resources/assets/js/app.js",
                ],
                refresh: true,
                preload: false,
            }),
        ],

        experimental: {
            renderBuiltUrl(filename, { hostId, hostType, type }) {
                if (hostType === "css") {
                    return path.basename(filename);
                }
            },
        },
    };
});
