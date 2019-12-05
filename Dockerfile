FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends curl git zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer global require hirak/prestissimo

COPY src /usr

WORKDIR /usr/src

RUN composer install