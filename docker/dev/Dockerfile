FROM laradock/php-fpm:2.2-7.2

LABEL application="beipro-main-backend"

ENV APP_HOME=/var/www
WORKDIR /var/www

# always run apt update when start and after, add new source list, then clean up at end.
RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie-backports main" > /etc/apt/sources.list.d/jessie-backports.list
RUN sed -i '/deb http:\/\/deb.debian.org\/debian jessie-updates main/d' /etc/apt/sources.list
RUN apt-get -o Acquire::Check-Valid-Until=false update

RUN apt-get install -y apt-transport-https && \
    apt-get update -yqq && \
    apt-get install -y apt-utils git-core netcat libzip-dev apache2-utils && \
    pecl channel-update pecl.php.net && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install zip && \
    docker-php-ext-install bcmath pcntl gd pgsql && \
    pecl install xdebug && docker-php-ext-enable xdebug

COPY . ${APP_HOME}

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install
