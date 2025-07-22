# Etapa 1: Dependencias de Laravel + Vite
FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el proyecto al contenedor
COPY . /var/www/html
WORKDIR /var/www/html

# Instala dependencias PHP (Laravel)
RUN composer install --no-dev --optimize-autoloader

# Instala dependencias JS (Vite/Vue)
RUN npm install && npm run build

# Mueve assets compilados a public
# (en Laravel/Vite ya se sirven por public/build automáticamente)

# Permisos necesarios
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configura Apache para Laravel
RUN a2enmod rewrite
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
