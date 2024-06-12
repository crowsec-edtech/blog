FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev

RUN docker-php-ext-install pdo pdo_sqlite

COPY apache.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html/

RUN chown www-data:www-data /var/www/html/database.sqlite

CMD ["apache2-foreground"]
