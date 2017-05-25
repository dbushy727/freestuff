# Free Stuff API
This api was built using Laravel 5.4

## Installation
Clone the repo

    $ git clone git@github.com:dbushy727/freestuff.git
    $ cd freestuff/api

Install dependencies via Composer

    $ composer install

Create your .env file

    $ cp .env.example .env

Generate App Key for encryption (necessary)

    $ php artisan key:generate

Create Database and run seeds

    $ touch database/database.sqlite
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


## Sample Request/Response

    Request: GET /listings/4
    HTTP Status: 200
    Content-Type: application/json

    {
      "id": 4,
      "name": "nihil",
      "slug": "nihil",
      "zip_code": "34017-1966",
      "description": "Voluptate sapiente consequatur voluptatem quisquam possimus fuga dignissimos. Quisquam sequi sunt qui doloribus. Omnis ea pariatur et eveniet sunt qui.",
      "is_active": true,
      "published_at": "2017-05-25 01:08:51",
      "created_at": "2017-05-25 01:08:51",
      "updated_at": "2017-05-25 01:08:51",
      "images": [
        {
          "id": 4,
          "listing_id": "4",
          "path": "http://lorempixel.com/300/300/?39278",
          "created_at": "2017-05-25 01:08:51",
          "updated_at": "2017-05-25 01:08:51"
        }
      ]
    }
