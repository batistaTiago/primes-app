FROM php:8.1

WORKDIR /var/www/html

ARG WWWGROUP=1000

ENV DEBIAN_FRONTEND noninteractive

# INSTALLING LINUX DEPENDENCIES
RUN apt-get update && apt-get install -y --no-install-recommends \
    libc-client-dev \
    build-essential \
    ca-certificates \
    zip \
    openssh-client \
    unzip \
    git \
    vim \
    nginx \
    gosu \
    unzip \
    wget \
    python2 \
    librdkafka-dev \
    gnupg \
    htop \
    libmcrypt-dev \
    libzip-dev \
    libxml2-dev

# INSTALLING PHP EXTENSIONS WITH DOCKER CMD
RUN docker-php-ext-install exif pcntl zip mysqli pdo_mysql \
    && docker-php-source delete

RUN apt clean && rm -rf /var/lib/apt/lists/*

# INSTALLING PHP EXTENSIONS WITH PECL CMD
RUN pecl install -o -f openswoole-22.0.0 \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable openswoole

# INSTALLING COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd --force -g $WWWGROUP sail

RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

# COPY ./php.ini /usr/local/etc/php/conf.d/99-sail.ini

COPY ./laravel-version/ ./

RUN composer install

RUN php artisan octane:install --server=swoole

EXPOSE 9000