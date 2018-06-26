# on-call

Work in progress..

# To do

+ Add compatibility for Apache and IIS auth.
+ Add mysql into the config docker file 
+ Build JSON API for eletrion front end 

# Building the image.

docker build -t simoneverett/on-call .

# Startin: Dev
docker run -p 80:80 -d -v $(pwd)/www/:/var/www/ --name on-call-primany simoneverett/on-call:latest

# Notes

Looks like the -v dosent work under win7 :-(

# stop

sudo docker stop on-call-primany

# remove

sudo docker rm on-call-primany

# build

sudo docker build --tag simoneverett/on-call .

# run

sudo docker run -d --name on-call-primany simoneverett/on-call:latest

# bash in

docker exec -i -t on-call-primany /bin/bash

# update prod

(  ;  ;  ; )

# Container IP

docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}'

# Clone

git clone https://github.com/simoneverett/on-call.git . 

# Update, Stop, Remove, Rebuild, start

(
    sudo git pull;
    sudo docker build --tag simoneverett/on-call . ;
    sudo docker stop on-call-primany ;
    sudo docker rm on-call-primany ;
    sudo docker run -d --name on-call-primany simoneverett/on-call:latest ;
)