# Project variables
PROJECT_NAME ?= beipro
TARGET_MAX_CHAR_NUM=10
# File names
DOCKER_DEV_COMPOSE_FILE := docker/dev/docker-compose.yml
DOCKER_SETUP := docker/setup.sh


.PHONY: help

## Show help
help:
	@echo ''
	@echo 'Usage:'
	@echo '${YELLOW} make ${RESET} ${GREEN}<target> [options]${RESET}'
	@echo ''
	@echo 'Targets:'
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		message = match(lastLine, /^## (.*)/); \
		if (message) { \
			command = substr($$1, 0, index($$1, ":")-1); \
			message = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} %s\n", command, message; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)
	@echo ''

## Builds the docker imagge of the application
app-build:
	@ ${INFO} "Building required docker images"
	@ bash ${DOCKER_SETUP}
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) build app
	@ ${INFO} "Build Completed successfully"
	@ echo " "

## Set local url on mac
app-url:
	@ ${INFO} "Updating hosts file"
	@ echo "127.0.0.1 beipro-local-api.com" | sudo tee -a /etc/hosts
	@ ${INFO} "Update completed succesfully"

## Start the docker application
app-start:
	@ ${INFO} "Starting local development server"
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) up -d
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) exec app docker/dev/entrypoint.sh

## Stops the docker application
app-stop:
	@ ${INFO} "Stoping local development server"
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) down

## Run all app tests
app-test:app-build
	@ ${INFO} "Running tests in docker container"
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) run --rm app composer test

## Accesses terminal in docker application
app-bash:
	${INFO} "Opening app container terminal"
	@ docker exec -it beipro-app /bin/bash

## Remove all images
app-clean:
	${INFO} "Cleaning your local environment"
	${INFO} "Note: All ephemeral volumes will be destroyed"
	@ docker-compose -f $(DOCKER_DEV_COMPOSE_FILE) down -v
	@ docker images -q -f label=application=$(PROJECT_NAME) | xargs -I ARGS docker rmi -f ARGS
	${INFO} "Removing dangling images"
	@ docker system prune
	${INFO} "Clean complete"

# COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
NC := "\e[0m"
RESET  := $(shell tput -Txterm sgr0)

# Shell Functions
INFO := @bash -c 'printf $(YELLOW); echo "===> $$1"; printf $(NC)' SOME_VALUE
SUCCESS := @bash -c 'printf $(GREEN); echo "===> $$1"; printf $(NC)' SOME_VALUE

