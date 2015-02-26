FROM tutum/apache-php

RUN apt-get update && apt-get install -yq git php5-intl php5-mcrypt
RUN php5enmod mcrypt
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /app
ADD . /app
RUN composer install --no-dev --prefer-dist
