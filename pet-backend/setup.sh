#!/bin/bash

CONTAINER_NAME="pet_backend_service"

docker compose up -d
docker exec -it $CONTAINER_NAME chmod -R 777 /var/www/html
docker exec -it $CONTAINER_NAME composer install
docker exec -it $CONTAINER_NAME cp .env.example .env
docker exec -it $CONTAINER_NAME php artisan key:generate
docker exec -it $CONTAINER_NAME php artisan migrate --seed
