FROM php:8.3-cli

# Set the working directory in the container to /app
WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql zip exif pcntl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the current directory contents into the container at /app
COPY . /app

# Install any project dependencies
RUN composer install

# Make your
EXPOSE 80

# Define the command to run your app using `CMD` which will always be PID 1.
CMD [ "php", "-v" ]