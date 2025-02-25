FROM php:8.2-fpm

RUN apt-get update \
    && apt-get -f install -y git libjpeg-dev libpng-dev libwebp-dev libzip-dev zip zlib1g-dev \
    && docker-php-ext-install pdo_mysql zip \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && apt-get clean
WORKDIR /var/www
