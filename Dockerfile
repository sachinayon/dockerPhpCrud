FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

COPY src/ /var/www/html/