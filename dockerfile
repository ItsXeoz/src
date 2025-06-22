# =============================
# Dockerfile Laravel untuk Railway (PHP 8.2, Port 9000)
# =============================

FROM php:8.2-cli

# Install sistem dependencies & PHP extensions
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

# Set permission untuk storage dan cache
RUN chmod -R 775 storage bootstrap/cache

# Install dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Copy .env jika belum ada
RUN cp .env.example .env || true

# Generate key jika belum ada
RUN php artisan key:generate || true

# Expose port 9000 agar sesuai dengan Railway
EXPOSE 9000

# Jalankan Laravel dengan PHP built-in server di port 9000
CMD php artisan config:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=9000
