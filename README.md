# Test rest api application

This app generates picture with user review ratio.

## Requirements

GD library or Imagick for generating images.

## Routes

GET: `/api/user/{user:hash}/ratio`

required parameters:
```
[
  'width' => 110, // int beetween 100 and 500
  'height' => 101, // int beetween 100 and 500
  'background' => '000', // string, hex value without hash
  'color' => 'fff', // string, hex value without hash
]
```

## Starting application

With docker:
```
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install # (or you can exec `composer install` on your system)
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer run post-root-package-install
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=UserWithReviewsSeeder
```

Without docker:

```
composer install
composer run post-root-package-install
php -S localhost:8082
# in another console: 
php artisan migrate
php artisan db:seed --class=UserWithReviewsSeeder
```

### Testing

`sail test` (with docker) or `php artisan test` (without)

---

[Task description (russian)](task.md)
