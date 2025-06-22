# Gunakan base image PHP CLI
FROM php:8.2-cli

# Install dependencies sistem & PHP extension
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql gd zip

# Install Composer dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur direktori kerja
WORKDIR /var/www

# Salin semua file proyek Laravel
COPY . .

# Set permission ke storage dan bootstrap
RUN chmod -R 775 storage bootstrap/cache

# Install dependencies Laravel + build assets
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Laravel pakai port 8080 di Railway
EXPOSE 8080

# Jalankan Laravel: cache config, migrasi, lalu serve
CMD ["sh", "-c", "php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080"]
