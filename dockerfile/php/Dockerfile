FROM    php:7.4-apache
RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev \
    && docker-php-ext-install pdo_mysql mysqli gd \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load
