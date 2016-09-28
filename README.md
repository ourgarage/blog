# Package Blog for Engin CMS
### Installation manual for developer
* Insert the file `composer.json` next string:
``` JSON
"require": {
        "ourgarage/blog": "dev-master"
    },
```
* Add a file `composer.json` next block:
``` JSON
"repositories": [
        {
            "type": "git",
            "url": "git@github.com:ourgarage/blog.git"
        }
    ],
```
* Run `php composer.phar update`
* Add in your `config/app.php` file in providers:
``` PHP
Ourgarage\Blog\BlogServiceProvider::class,
```
* Run `php artisan vendor:publish --tag=blog`
* Run `php artisan migrate`
