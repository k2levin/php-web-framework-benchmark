FROM alpine:3.14
# Alpine v3.14 will install php v8.0

RUN set -x \

    # create non-root user
    && adduser -D -u 1000 -S www-data -G www-data \

    # install required software packages
    && apk add --no-cache alpine-sdk s6 \

    # install php and extensions
    php8 php8-bcmath php8-ctype php8-curl php8-dom php8-fileinfo php8-json php8-mbstring php8-opcache \
    php8-openssl php8-pdo_mysql php8-pcntl php8-phar php8-posix php8-redis php8-session php8-tokenizer php8-xml php8-xmlwriter \

    # install php ext swoole from edge branch & testing repository
    && apk add --no-cache -X https://dl-cdn.alpinelinux.org/alpine/edge/testing php8-pecl-swoole

COPY --chmod=755 ./dockerfiles/entrypoint.sh /
COPY --chmod=755 ./dockerfiles/setup.sh /
COPY --chmod=644 --chown=www-data:www-data ./dockerfiles/php/opcache.ini /etc/php8/conf.d/00_opcache.ini
COPY --chmod=755 --chown=www-data:www-data ./dockerfiles/s6-scan/. /run/openrc/s6-scan/
COPY --chmod=u=rwX,go=rX --chown=www-data:www-data . /var/www/html/

# set configuration and optimize for production
RUN /setup.sh

# run with non-root user to ensure least privilege
USER www-data
WORKDIR /var/www/html
ENTRYPOINT ["/entrypoint.sh"]
CMD ["sh"]
