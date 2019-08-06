#!/bin/bash

cd docker/

if [ ! -d "./docker-postgresql-multiple-databases" ]; then
    printf "Docker setup started"

    printf "\n\n======================================\n"
    printf "Setting up docker"
    printf "\n======================================\n\n"

    git clone https://github.com/mrts/docker-postgresql-multiple-databases.git

    printf "\n\n======================================\n"
    printf "Setup successful"
    printf "\n======================================\n\n"
fi

exit 0
