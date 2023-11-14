FROM php:8.1-apache

RUN docker-php-ext-install pdo_mysql && \
    pecl install redis && \
    docker-php-ext-enable redis


WORKDIR /var/www/html

COPY webapp .
COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage && \
    chmod -R 775 /var/www/html/bootstrap/cache
    
EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
