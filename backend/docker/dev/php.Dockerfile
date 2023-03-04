# TODO: users & permissions 
FROM php:fpm-alpine

ENV USERNAME=www-data
ENV APP_HOME /var/www/html

RUN apk add --no-cache\
      procps \
      icu-dev \
      zlib-dev \
      libxml2 \
      libxml2-dev \
      readline-dev \
      supervisor \
      apk-cron \
      libzip-dev \
      libpq-dev \
      linux-headers \
      unzip

RUN docker-php-ext-configure intl && docker-php-ext-install intl

RUN docker-php-ext-install pdo pdo_pgsql

RUN docker-php-ext-install \
      sockets \
      intl \
      opcache \
      zip

# composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN mv composer.phar /usr/local/bin/composer
RUN rm composer-setup.php

RUN chown -R $USERNAME:$USERNAME $APP_HOME

# laravel
# composer create-project laravel/laravel ./
# chown -R www-data:www-data html