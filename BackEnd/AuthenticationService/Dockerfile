#  Install dependencies PHP
FROM composer:2.4 as composer
WORKDIR /app
COPY . .
RUN composer install --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist --optimize-autoloader --no-dev
RUN composer dumpautoload
RUN php artisan cache:clear
RUN php artisan route:cache
RUN php artisan livewire:publish --assets 
RUN php artisan storage:link


FROM php:8.2-fpm

ARG SERVERNAME
ARG ENVIRONMENT

# Set working directory
WORKDIR /var/www/html

# Add docker php ext repo
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php extensions
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring pdo_mysql zip exif pcntl gd memcached

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    lua-zlib-dev \
    libmemcached-dev \
    nginx

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy code to /var/www
COPY --from=composer /app/ ./

# add root to www group
RUN chmod -R ug+w /var/www/html/storage
# RUN chmod -R ug+w /var/www
RUN chown -R www-data:www-data *

# Environment
RUN mv ./.env.prod ./.env


# Copy nginx/php/supervisor configs
RUN cp ./docker/nginx.conf /etc/nginx/sites-enabled/default

# PHP Error Log Files
RUN mkdir /var/log/php
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

RUN touch /var/www/html/storage/logs/laravel.log && \
    chmod 777 /var/www/html/storage/logs/laravel.log

EXPOSE 80
