# AuthenticationService

Este microservicio es responsable de manejar la autenticación de usuarios.

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL

## Instalación

1. Ejecuta `cd BackEnd/AuthenticationService`.
2. Instala las dependencias con Composer: `composer install`.
3. Crea un archivo `.env` a partir del archivo `.env.prod` y configura las variables de entorno necesarias, como las credenciales de la base de datos.
4. Ejecuta las migraciones: `php artisan migrate`.

## Ejecución

Para ejecutar el servicio, puedes utilizar el comando `php artisan serve`. Por defecto, el servicio se ejecutará en `http://localhost:8021`.

# CategoryService

Este microservicio es responsable de manejar las categorías de productos.

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL

## Instalación

1. Ejecuta `cd BackEnd/CategoryService`.
2. Instala las dependencias con Composer: `composer install`.
3. Crea un archivo `.env` a partir del archivo `.env.prod` y configura las variables de entorno necesarias, como las credenciales de la base de datos.
4. Ejecuta las migraciones: `php artisan migrate`.

## Ejecución

Para ejecutar el servicio, puedes utilizar el comando `php artisan serve`. Por defecto, el servicio se ejecutará en `http://localhost:8022`.

# GatewayService

Este microservicio es responsable de manejar la comunicación entre los demás microservicios y la lógica de negocio general.

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL

## Instalación

1. Ejecuta `cd BackEnd/GatewayService`.
2. Instala las dependencias con Composer: `composer install`.
3. Crea un archivo `.env` a partir del archivo `.env.prod` y configura las variables de entorno necesarias.

## Ejecución

Para ejecutar el servicio, puedes utilizar el comando `php artisan serve`. Por defecto, el servicio se ejecutará en `http://localhost:8020`.
