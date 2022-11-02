# Test project by Sergey Kotelnikov


## How to setup the project

``docker-compose up -d``

``docker run --rm -it -v $(pwd)/images/php/app:/app $(docker build -q .) composer install``

``docker-compose exec php php ../artisan migrate``

``docker-compose exec php php ../artisan db:seed``
