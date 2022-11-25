FROM php:8.0-apache
WORKDIR /var/www/html/
RUN docker-php-ext-install mysqli && \
    a2enmod authn_dbd && \
    apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql && \
    pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis && \
    service apache2 restart
