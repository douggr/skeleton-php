# FROM php:7.2-fpm
# FROM php:7.3-fpm
# FROM php:7.4-fpm
FROM php:8.0-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update --fix-missing
RUN apt-get install -y --no-install-recommends \
  libbz2-dev \
  libicu-dev \
  libonig-dev \
  libxml2-dev \
  libzip-dev

RUN docker-php-ext-install \
  bcmath \
  bz2 \
  calendar \
  intl \
  mbstring \
  soap \
  sockets \
  zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Enable Redis
#RUN pecl install redis && docker-php-ext-enable redis

# Enable MySQL
#RUN docker-php-ext-install pdo_mysql

# Enable PostgreSQL
#RUN apt-get install -y --no-install-recommends libpq5 libpq-dev
#RUN docker-php-ext-install pdo_pgsql

# Clean up
RUN apt-get -yq purge $(dpkg --get-selections | awk '{print $1}' | grep '\-dev$')
RUN apt-get -yq autoremove --purge && apt-get clean

CMD ["php-fpm"]

EXPOSE 9000
