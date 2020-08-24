FROM docker.dev.pardot.com/base/php:7.2.13

ARG artifactory_host=artifactory.dev.pardot.com
ARG build_version=0

RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime && \
    mkdir /etc/crumb && \
    mkdir /app

WORKDIR /app
COPY . /app

RUN /app/composer.phar install --no-progress

CMD ["./vendor/phpunit/phpunit/phpunit"]