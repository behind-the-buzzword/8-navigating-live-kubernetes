FROM php:7.2-fpm

ARG BUILD_ENV=prod
ENV ENVIROMENT $BUILD_ENV
ENV COMPOSER_MEMORY_LIMIT=-1

ADD build/docker/app/www.conf /usr/local/etc/php-fpm.d/

RUN apt-get update && \
    apt-get install -y --no-install-recommends software-properties-common && \
    add-apt-repository ppa:jonathonf/ffmpeg-4 && \
    apt-get install -y --no-install-recommends ffmpeg && \
    add-apt-repository --remove ppa:jonathonf/ffmpeg-4 && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y \
    imagemagick \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libbz2-dev \
    libxml2-dev \
    libglu1 \
    cron \
    unzip \
    procps && \
    && pecl channel-update pecl.php.net && \
    && pecl install apcu mcrypt-1.0.1 && \
    docker-php-ext-install zip bz2 mbstring pdo pdo_mysql pcntl soap && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install gd && \
    docker-php-ext-enable mcrypt && \
    echo "memory_limit=2048M\nmax_execution_time=900\npost_max_size=20M\nupload_max_filesize=20M" > $PHP_INI_DIR/conf.d/memory-limit.ini && \
    echo "extension=apcu.so" > $PHP_INI_DIR/conf.d/apcu.ini && \
    echo "date.timezone=${PHP_TIMEZONE:-UTC}" > $PHP_INI_DIR/conf.d/date_timezone.ini && \
    echo "display_errors=stderr" > $PHP_INI_DIR/conf.d/display-errors.ini && \
    echo "cgi.fix_pathinfo=0" > $PHP_INI_DIR/conf.d/path-info.ini && \
    echo "expose_php=0" > $PHP_INI_DIR/conf.d/path-info.ini && \
    rm -rf /var/www/html && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer global require hirak/prestissimo

ADD . /var/www/html
WORKDIR /var/www/html

RUN if [ $BUILD_ENV != "prod" ] ; then \
        composer install; \
    else \
        composer install --no-dev -o; \
    fi ;

RUN usermod -u 1000 www-data && \
    chown -R www-data:www-data /var/www

CMD ["/bin/sh", "-c", "php-fpm"]
