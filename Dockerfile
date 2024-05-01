FROM php:8.3-cli


RUN apt-get update && apt-get install -y \
    git zip unzip

RUN pecl install xdebug; \
    docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar composer
RUN mv composer /bin

ENV XDEBUG_MODE=debug
ENV XDEBUG_CLIENT_HOST=host.docker.internal
ENV PHP_IDE_CONFIG="serverName=host.docker.internal"

WORKDIR /app

CMD ["php", "-S", "0.0.0.0:80", "index.php"]