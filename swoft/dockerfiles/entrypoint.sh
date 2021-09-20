#!/bin/sh

# running by non-root user

set -e

# Laravel optimize for production
COMPOSER_MEMORY_LIMIT=-1 composer install -a --no-dev --ignore-platform-reqs --working-dir=/var/www/html

# run s6-svscan with PID 1 with non-root user to ensure least privilege
exec /bin/s6-svscan /run/openrc/s6-scan
