# Gunakan PHP 8.2 CLI karena pakai artisan serve
FROM php:8.2-cli

# Install dependencies
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

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin semua file project
COPY . .

# Set permission untuk Laravel
RUN chmod -R 775 storage bootstrap/cache

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Laravel menggunakan port 8080 di Railway
EXPOSE 8080

# Jalankan migration, cache config, dan start Laravel
CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
