import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
           input: [
  'resources/css/main.css',
  'resources/vendor/bootstrap/css/bootstrap.min.css',
  'resources/vendor/bootstrap-icons/bootstrap-icons.css',
  'resources/vendor/glightbox/css/glightbox.min.css',
  'resources/vendor/swiper/swiper-bundle.min.css',
  'resources/vendor/bootstrap/js/bootstrap.bundle.min.js',
  'resources/vendor/php-email-form/validate.js',
  'resources/vendor/purecounter/purecounter_vanilla.js',
  'resources/vendor/glightbox/js/glightbox.min.js',
  'resources/vendor/swiper/swiper-bundle.min.js',
  'resources/vendor/imagesloaded/imagesloaded.pkgd.min.js',
  'resources/vendor/isotope-layout/isotope.pkgd.min.js',
  'resources/js/main.js','resources/css/app.css', 'resources/js/app.js',
  'resources/css/theme.css', 'resources/js/app.js', 'resources/js/iconify-icon.min.js', 
  'resources/js/sidebarmenu.js', 'resources/js/overlay.js', 'resources/js/index.js', 'resources/js/jquery.min.js', 'resources/js/simplebar.min.js'
],
            refresh: true,
        }),
    ],
});
