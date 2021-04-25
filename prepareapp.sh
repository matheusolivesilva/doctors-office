#!/bin/bash
composer install
sleep 30 
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate --no-interaction
