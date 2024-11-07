FROM ubuntu:24.04

ENV timezone=America/Sao_Paulo

RUN apt-get update && \
    apt-get install -y apt-utils && \
    ln -snf /usr/share/zoneinfo/${timezone} /etc/localtime && echo ${timezone} > /etc/timezone && \
    apt-get install -y apache2 && \ 
    apt-get install -y php && \
    apt-get install -y php-xdebug && \
    apt-get install -y php8.3-mysql && \
    apt-get install -y git && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && rm composer-setup.php && mv composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer

EXPOSE 80

WORKDIR /var/www/html

ENTRYPOINT /etc/init.d/apache2 start && /bin/bash

CMD ["true"]
