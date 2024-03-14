#!/bin/bash

composer update --no-interaction
php artisan migrate
php-fpm
