# Etapa base: Laravel + Apache + Node
FROM php:8.2-apache

# Instalar extensiones y dependencias del sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    libsqlite3-dev sqlite3 \
    libpq-dev \ 
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite pdo_pgsql mbstring exif pcntl bcmath gd


# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache (evita warnings por ServerName)
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiar archivos del proyecto
COPY . /var/www/html
WORKDIR /var/www/html

# Copiar .env si no existe (esto solo sirve en build, Render usa variables reales)
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Instalar dependencias PHP y generar clave
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate || true  # en Render no siempre está .env aún

# Instalar dependencias JS y compilar assets
RUN npm install && npm run build

# Dar permisos a carpetas necesarias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Reemplazar configuración default de Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Cache de configuración y migraciones automáticas (opcionales en Render)
RUN php artisan config:cache \
    && php artisan migrate --force || true

# Exponer el puerto HTTP
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
