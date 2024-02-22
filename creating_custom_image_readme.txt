These are the steps to create the custome image that runs php and apache with the right extensions included

1. Shut down everything
^c
docker-compose down

2. Open a terminal window

3. Run an existing image
docker run -dt php:8.3-apache

4. See that it's running
docker ps
# CONTAINER ID   IMAGE            COMMAND   CREATED              STATUS              
# whateverurid   php:8.3-apache   "R"       6 minutes ago        Up 6 minutes

5. Shell into it
docker exec -it whateverurid bash

6. Update and install
apt-get update
apt-get install -y
docker-php-ext-install pdo_mysql
a2enmod rewrite

7. Open another terminal tab/window, and save the running container you modified
docker commit whateverurid php8-apache-mysqlpdo

8. Inspect to ensure it saved correctly
docker image ls
# REPOSITORY           TAG       IMAGE ID       CREATED         SIZE
# existing-image       latest    a7dde5d84fe5   7 minutes ago   888MB
# php8-apache-mysqlpdo         latest    d57fd15d5a95   2 minutes ago   888MB

9. shutdown and delete the container then restart the app container
docker-compose up