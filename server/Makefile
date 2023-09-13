install:
	@docker exec -u 1000 php composer install
	@docker exec php php artisan key:generate

dump:
	@docker exec -u 1000 php composer dumpautoload

up:
	@docker-compose -f ../docker/docker-compose.yml -p challenge up -d

down:
	@docker-compose -f ../docker/docker-compose.yml -p challenge down

restart:
	@docker-compose -f ../docker/docker-compose.yml -p challenge restart

reset:
	@docker-compose -f ../docker/docker-compose.yml -p challenge down -v
	@docker-compose -f ../docker/docker-compose.yml -p challenge up --build -d

permissions:
	@docker exec php chown -cR 1000:33 ./bootstrap/cache/ ./storage/
	@docker exec php chmod -cR 775 ./bootstrap/cache/ ./storage/

clear:
	@docker exec php rm ./bootstrap/cache/*.php
	@docker exec php php artisan optimize:clear

migrate:
	@docker exec -t php php artisan migrate:refresh --seed

php:
	@docker exec -it -u 1000 php bash

node:
	@docker exec -it -u 1000 nodejs bash


admin:
	@docker exec -it php bash

tinker:
	@docker exec -it php bash -c "while true; do php artisan tinker; done"
