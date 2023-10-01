FROM php:8.0-apache
WORKDIR /var/www/html
COPY . /var/www/html/
RUN apt-get update
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo pdo_pgsql
RUN a2enmod rewrite
RUN apt-get -y update && apt-get -y upgrade && apt-get install -y ffmpeg
RUN service apache2 restart