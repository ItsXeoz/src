# Gunakan base image PHP 8.2 CLI karena Laravel pakai artisan serve
FROM php:8.2-cli

# Install dependensi sistem & ekstensi PHP yang dibutuhkan Laravel
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

# Copy semua file proyek Laravel
COPY . .

# Berikan izin pada folder yang dibutuhkan Laravel
RUN chmod -R 775 storage bootstrap/cache

# Jalankan composer install tanpa dependensi dev
RUN composer install --no-dev --optimize-autoloader

# Jalankan npm untuk frontend
RUN npm install && npm run build

# Railway menggunakan port 8080
EXPOSE 8080

# Jalankan Laravel (tanpa Artisan::call dari ServiceProvider agar tidak crash)
CMD php artisan config:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8080
