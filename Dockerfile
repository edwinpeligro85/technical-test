# Usa una imagen base de PHP
FROM php:8.0-apache

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html

# Instala las dependencias de tu proyecto usando Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Establece el puerto en el que se ejecutará la aplicación
EXPOSE 80

# Inicia el servidor web de Apache
CMD ["apache2-foreground"]
