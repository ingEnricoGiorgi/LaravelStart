# Usa l'immagine PHP 8.1 come base
FROM php:8.1-fpm

# Installa l'estensione pdo_mysql e xdebug
#RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


# Aggiorna i pacchetti e installa curl
RUN apt-get update && apt-get install -y curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer




# Copia il file php.ini dalla tua macchina host al container
COPY ./config/php.ini /usr/local/etc/php/php.ini

# Definisci la directory di lavoro nel container
WORKDIR /var/www/html

# Copia tutto il contenuto del progetto nel container
COPY . /var/www/html

