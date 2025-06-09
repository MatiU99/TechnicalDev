FROM php:8.2-cli

# Instala dependencias
RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setea el directorio de trabajo
WORKDIR /var/www

# Copia el proyecto Laravel si existe localmente
COPY ./src /var/www

# Permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Comando por defecto
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]