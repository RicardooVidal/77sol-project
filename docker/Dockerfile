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

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/77sol-project

COPY . .

# Apenas para testes locais. Em um servidor o correto seria 0755
RUN chmod -R 775 ./storage
RUN chmod -R 775 ./public/swagger

EXPOSE 9000

CMD ["sh", "-c", "composer install --ignore-platform-reqs && cp .env.dev .env && php artisan key:generate && php-fpm"]