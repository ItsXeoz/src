# Gunakan base image PHP CLI
FROM php:8.2-cli

# Install dependency sistem dan PHP extension yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev libpq-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip gd mbstring xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Set permission untuk Laravel storage
RUN chmod -R 775 storage bootstrap/cache

# Install dependency
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Laravel memerlukan .env file, pastikan tersedia
RUN cp .env.example .env || true

# Generate key
RUN php artisan key:generate

# Expose port 8080 untuk Railway
EXPOSE 8080

# Jalankan Laravel pakai internal PHP server
CMD php artisan config:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8080
