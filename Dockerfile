# Alpine Linux with PHP FPM 
FROM php:8.2.4-apache
# copy App into image 
COPY --chown=www-data:www-data ./ /var/www/html/  
# enable apache extensions
RUN a2enmod rewrite
# install NFS and PHP extensions
RUN apt-get update -y && apt-get install -y nfs-kernel-server nfs-common tini zlib1g-dev libpng-dev libzip-dev libicu-dev libmagickwand-6.q16-dev
RUN docker-php-ext-install gd exif zip intl mysqli
# Configure PHP for Cloud Run.
# Precompile PHP code with opcache.
RUN docker-php-ext-install -j "$(nproc)" opcache
RUN pecl install imagick
# Set up imagemagick and PHP site settings
RUN echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini 
RUN echo "php_time_limit=50000" > /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "php_post_max_size=8196M" >> /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "php_memory_limit=2048M" >> /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "php_max_input_vars=100000" >> /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "upload_max_filesize=8196M" >> /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "max_input_vars=5000" >> /usr/local/etc/php/conf.d/fulgormilano.ini
RUN echo "max_execution_time=120" >> /usr/local/etc/php/conf.d/fulgormilano.ini
# Add Cloud Run suggested default settings
RUN set -ex; \
  { \
    echo "; Cloud Run enforces memory & timeouts"; \
    echo "memory_limit = -1"; \
    echo "max_execution_time = 0"; \
    # echo "; File upload at Cloud Run network limit"; \
    # echo "upload_max_filesize = 32M"; \
    # echo "post_max_size = 32M"; \
    echo "; Configure Opcache for Containers"; \
    echo "opcache.enable = On"; \
    echo "opcache.validate_timestamps = Off"; \
    echo "; Configure Opcache Memory (Application-specific)"; \
    echo "opcache.memory_consumption = 128"; \
    echo "opcache.interned_strings_buffer = 64"; \
    echo "opcache.max_accelerated_files = 32531"; \
    echo "opcache.validate_timestamps = 0"; \
    echo "opcache.save_comments = 1"; \
    echo "opcache.fast_shutdown = 0"; \
  } > "$PHP_INI_DIR/conf.d/cloud-run.ini"
# See https://cloud.google.com/run/docs/quickstarts/build-and-deploy/deploy-php-service

# Use the PORT environment variable in Apache configuration files.
# https://cloud.google.com/run/docs/reference/container-contract#port
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Enable docker site
ADD ./001-docker.conf /etc/apache2/sites-available/
RUN a2ensite 001-docker

# Copy run file to be executed later 
COPY --chown=www-data:www-data run.sh /run.sh
RUN chmod u+x /run.sh
CMD ["/run.sh"] 
