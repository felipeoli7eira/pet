#!/bin/bash

CONTAINER_NAME="pet_backend_service"

docker exec -it $CONTAINER_NAME chmod -R 777 /var/www/html
