FROM php:8.1-apache

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY apache.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html/
