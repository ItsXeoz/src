FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev libpq-dev libonig-dev libxml2-dev nginx supervisor \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip gd mbstring xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www

# Copy project
COPY . .

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install && npm run build

# Copy Nginx config
COPY nginx/conf.d/default.conf /etc/nginx/sites-available/default

# Copy Entrypoint
COPY nginx/conf.d/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose the HTTP port
EXPOSE 8080

CMD ["/entrypoint.sh"]
