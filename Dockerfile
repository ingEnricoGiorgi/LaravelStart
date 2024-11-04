# Usa l'immagine PHP 8.1 come base
FROM php:8.1-fpm

# Installa le estensioni richieste: pdo_mysql e zip, e strumenti addizionali come git e unzip
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && pecl install xdebug || true \
    && docker-php-ext-enable xdebug

# Installa Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia il file php.ini dalla tua macchina host al container
COPY ./config/php.ini /usr/local/etc/php/php.ini

# Definisci la directory di lavoro nel container
WORKDIR /var/www/html

# Copia tutto il contenuto del progetto nel container
COPY . /var/www/html
