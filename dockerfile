FROM ubuntu

RUN apt update &&  apt-get -y upgrade
RUN DEBIAN_FRONTEND=noninteractiv apt-get -y install apache2 mysql-server supervisor php php-mysql
RUN mkdir -p /var/log/supervisor /var/lock/apache2 /var/run/apache2 

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
EXPOSE 22 80 3306


CMD ["/usr/bin/supervisord"]

