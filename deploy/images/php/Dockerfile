FROM php:8.2-cli

WORKDIR /usr/src/primes-app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.json .

RUN composer install

COPY index.php .