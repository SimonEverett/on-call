FROM ubuntu:latest
MAINTAINER Simon Everett <dev@simon-everett.co.uk>

RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN apt-get update && apt-get -y upgrade  

RUN apt-get -y install php libapache2-mod-php php-mysql
RUN apt-get -y install apache2 php-curl

# Enable apache mods.
RUN a2enmod rewrite

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose apache. Update to 443 for prd.
EXPOSE 80

# Copy this repo into place.
ADD www /var/www/

# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# By default start up apache in the foreground, override with /bin/bash for interative.
CMD /usr/sbin/apache2ctl -D FOREGROUND
