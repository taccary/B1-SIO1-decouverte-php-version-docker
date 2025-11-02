FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html
COPY custom-php.ini /usr/local/etc/php/conf.d/
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN chown -R www-data:www-data /var/www/html


