#!/bin/sh

# running by root user

set -e

# timezone UTC+08 setup
apk add --update tzdata
cp /usr/share/zoneinfo/Asia/Singapore /etc/localtime
echo 'Asia/Singapore' > /etc/timezone
apk del tzdata

# nginx optimize for production
sed -i 's/user nginx;/# user nginx;/1' /etc/nginx/nginx.conf
sed -i "s/worker_processes auto;/worker_processes $(nproc);/1" /etc/nginx/nginx.conf
sed -i 's/worker_connections 1024;/worker_connections 2048;/1' /etc/nginx/nginx.conf
sed -i 's/keepalive_timeout 65;/keepalive_timeout 30;/1' /etc/nginx/nginx.conf
sed -i 's/access_log \/var\/log\/nginx\/access.log main;/access_log off;/1' /etc/nginx/nginx.conf
sed -i 's/error_log \/var\/log\/nginx\/error.log warn;/error_log stderr warn;/1' /etc/nginx/nginx.conf
install -d -o www-data -g www-data /run/nginx
chown -R www-data:www-data /var/lib/nginx /var/log/nginx

# php optimize for production
sed -i 's/user = nobody/;user = nobody/1' /etc/php8/php-fpm.d/www.conf
sed -i 's/group = nobody/;group = nobody/1' /etc/php8/php-fpm.d/www.conf
sed -i 's/pm = dynamic/pm = static/1' /etc/php8/php-fpm.d/www.conf
sed -i "s/pm.max_children = 5/pm.max_children = $(nproc)/1" /etc/php8/php-fpm.d/www.conf
sed -i 's/;pm.max_requests = 500/pm.max_requests = 1000/1' /etc/php8/php-fpm.d/www.conf
sed -i 's/expose_php = On/expose_php = Off/1' /etc/php8/php.ini
sed -i 's/memory_limit = 128M/memory_limit = 256M/1' /etc/php8/php.ini
sed -i 's/max_execution_time = 30/max_execution_time = 60/1' /etc/php8/php.ini
chown -R www-data:www-data /var/log/php8
ln -s /usr/bin/php8 /usr/bin/php

# Laravel scheduler setup
echo "* * * * * php /var/www/html/artisan schedule:run >> /dev/null 2>&1" > /etc/crontabs/www-data

# Laravel working directory setup
curl -O https://getcomposer.org/download/latest-stable/composer.phar && mv composer.phar /usr/local/bin/composer && chmod 755 /usr/local/bin/composer
