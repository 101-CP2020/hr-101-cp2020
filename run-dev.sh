#!/bin/bash

if [ -f .env ]; then
. ./.env
fi

docker-compose -f docker/docker-compose.yml up -d --build
docker exec -it hr-backend-php sh -c "composer install"
docker exec -it hr-backend-php sh -c "php init --no_interactive --env=$ENV --db_host=$DB_HOST --db_name=$DB_NAME --db_user=$DB_USER --db_password=$DB_PASSWORD"