#!/bin/sh

# running by root user

set -e

# timezone UTC+08 setup
apk add --update tzdata
cp /usr/share/zoneinfo/Asia/Singapore /etc/localtime
echo 'Asia/Singapore' > /etc/timezone
apk del tzdata

# php optimize for production
sed -i 's/expose_php = On/expose_php = Off/1' /etc/php8/php.ini
sed -i 's/memory_limit = 128M/memory_limit = 256M/1' /etc/php8/php.ini
sed -i 's/max_execution_time = 30/max_execution_time = 60/1' /etc/php8/php.ini
sed -i '/max_execution_time = 60/a swoole.use_shortname = Off' /etc/php8/php.ini
ln -s /usr/bin/php8 /usr/bin/php

# working directory setup
curl -O https://getcomposer.org/download/latest-stable/composer.phar && mv composer.phar /usr/local/bin/composer && chmod 755 /usr/local/bin/composer
