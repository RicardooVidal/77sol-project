FROM php:8.2-fpm-alpine

RUN apk --no-cache add \
    bash \
    shadow \
    curl \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    icu-dev \
    mysql-client \
    && docker-php-ext-install \
    pdo_mysql \
    zip \
    intl
    
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

USER www-data

EXPOSE 9000
CMD ["php-fpm"]