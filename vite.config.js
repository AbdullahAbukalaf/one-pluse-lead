import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/site.css',
        'resources/js/site.js',
        'resources/css/admin.css',
        'resources/js/admin.js',
      ],
      refresh: true,
    }),
  ],
  resolve: { alias: { '@': '/resources' } },
  // let Vite bundle media/fonts from resources/
  assetsInclude: ['**/*.mp4','**/*.webm','**/*.ogg','**/*.woff','**/*.woff2','**/*.ttf','**/*.eot','**/*.svg'],
})
