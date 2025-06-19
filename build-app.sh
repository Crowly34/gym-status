#!/usr/bin/env bash
set -e

php artisan config:clear
php artisan cache:clear

npm run build

php artisan config:cache
php artisan route:cache
php artisan view:cache
