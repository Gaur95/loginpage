FROM ubuntu:18.04
ENV TZ=Etc/UTC
RUN apt-get update && \
    apt-get install -yq tzdata && \
    ln -fs /usr/share/zoneinfo/America/New_York /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

RUN apt update ; apt install apache2 -y 
RUN apt install php -y
EXPOSE 80
COPY index.html /var/www/html/index.html
COPY helo.php /var/www/html/
RUN apt-get install -y default-mysql-client

RUN echo "extension=mysqli" >> /etc/php/7.2/apache2/php.ini
RUN apt-get install php-mysql -y
COPY chal.sh usr/sbin/chal.sh
RUN chmod 755 usr/sbin/chal.sh
CMD ["usr/sbin/chal.sh"]

