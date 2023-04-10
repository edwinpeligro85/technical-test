FROM php:8.2-fpm-alpine

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Instalar dependencias
RUN apk add --no-cache && \
    docker-php-ext-install pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev && \
    rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*

# Configurar Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
RUN mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views && \
    chown -R www-data:www-data /var/www/html/storage

# Exponer el puerto 80
EXPOSE 80

# Ejecutar el servidor PHP-FPM
CMD ["php-fpm"]