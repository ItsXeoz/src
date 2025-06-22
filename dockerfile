# Gunakan PHP 8.2 CLI karena kita menggunakan artisan serve
FROM php:8.2-cli

# Install dependensi sistem & PHP extension yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev libpq-dev nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory di dalam container
WORKDIR /var/www

# Salin semua file project Laravel
COPY . .

# Berikan izin akses ke direktori yang dibutuhkan Laravel
RUN chmod -R 775 storage bootstrap/cache

# Install dependency Laravel & frontend
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Railway akan mengakses aplikasi melalui port 8080
EXPOSE 8080

# Jalankan Laravel menggunakan server internal PHP dan migrate otomatis
CMD ["sh", "-c", "php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080"]
