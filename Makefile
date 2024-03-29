SHELL := /bin/bash

start:
	docker-compose up -d
	symfony server:start -d
stop:
	symfony server:stop
	docker-compose down
tests:
	symfony console doctrine:database:drop --force --env=test || true
	symfony console doctrine:database:create --env=test
	symfony console doctrine:migrations:migrate -n --env=test
	symfony console doctrine:fixtures:load -n --env=test
	symfony php bin/phpunit $(MAKECMDGOALS) --stop-on-failure --stop-on-error
.PHONY: tests