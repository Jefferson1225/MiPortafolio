# Etapa base: Laravel + Apache + Node
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    libsqlite3-dev sqlite3 \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el proyecto
COPY . /var/www/html
WORKDIR /var/www/html

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias JS y compilar
RUN npm install && npm run build

# Permisos necesarios
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Configuración de Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Cache de configuración y migraciones
RUN cp .env.example .env \
    && php artisan config:cache \
    && php artisan migrate --force || true

EXPOSE 80
