#!/bin/bash

# Install Composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Clear and cache Laravel config
php artisan config:cache
php artisan route:cache
php artisan view:cache
