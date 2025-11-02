FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql

COPY . /var/www/html
COPY custom-php.ini /usr/local/etc/php/conf.d/
RUN chown -R www-data:www-data /var/www/html

RUN apt-get update && apt-get install -y \
        zip unzip git libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/*

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini