# Free Stuff API
This api was built using Laravel 5.4

## Installation
Clone the repo

    $ git clone git@github.com:dbushy727/freestuff.git
    $ cd freestuff/api

Create your .env file

    $ cp .env.example .env

Generate App Key for encryption (necessary)

    $ php artisan key:generate

Create Database and run seeds

    $ php artisan migrate:refresh --seed

Done!


## Routes

### Listings
- GET /listings
- POST /listings
- GET /listings/{id}
- PUT /listings/{id}
- DELETE /listings/{id}

### Listing Images
- GET /listing-images
- POST /listing-images
- GET /listing-images/{id}
- PUT /listing-images/{id}
- DELETE /listing-images/{id}
