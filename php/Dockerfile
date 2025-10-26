FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y \
    git unzip libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev libonig-dev libxml2-dev ca-certificates procps cron nfs-common \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg --with-freetype \
 && docker-php-ext-install -j$(nproc) gd intl mbstring pdo_mysql mysqli soap exif zip opcache gettext

# Install phpredis
RUN pecl channel-update pecl.php.net \
 && pecl install redis \
 && docker-php-ext-enable redis

# Adjust www-data UID to 33
RUN usermod -u 33 www-data || true
WORKDIR /var/www/html

# Copy entrypoint
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Default command
CMD ["php-fpm"]
