FROM ambientum/php:7.4-nginx
COPY . /var/www/app
EXPOSE 8081 8080
WORKDIR /var/www/app
RUN sudo chmod -R 777  .
RUN composer install 
ENTRYPOINT sleep 30 && php bin/console doctrine:database:create && php bin/console doctrine:migrations:migrate --no-interaction
