#!/bin/bash

# Jalankan migration & cache config
php artisan config:cache
php artisan migrate --force

# Jalankan php-fpm dan nginx secara bersamaan
php-fpm -D
nginx -g "daemon off;"
