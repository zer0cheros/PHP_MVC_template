# Use an official PHP-Apache image
FROM php:8.2-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libonig-dev \
    libsqlite3-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pdo_sqlite

# Copy application files to the container
COPY ./www /var/www/html/

# Copy Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf
# Set correct permissions for the web directory

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80