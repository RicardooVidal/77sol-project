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
    intl \
    mbstring \
    exif \
    pcntl \
    bcmath

WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

USER www-data

EXPOSE 9000

CMD ["sh", "-c", "composer install --ignore-platform-reqs && cp .env.dev .env && php-fpm"]
