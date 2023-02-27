FROM php:8.2-cli

WORKDIR /usr/src/primes-app

COPY ./composer.json .

RUN composer install

COPY index.php .