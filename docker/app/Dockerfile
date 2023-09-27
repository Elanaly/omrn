FROM php:8.2-fpm

ENV TZ Asia/Tokyo

RUN apt-get update 
    && apt-get install -y \
    git \
    unzip \
    zip \
    vim \
    libzip-dev \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfontconfig1 \
    libxrender1

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql mysqli exif zip intl

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

WORKDIR /app