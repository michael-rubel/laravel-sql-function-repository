![Run database function](https://user-images.githubusercontent.com/37669560/176688279-9cae459f-d758-453a-80c1-cf1b345f9cc4.png)

# Laravel SQL Function Repository
[![Latest Version on Packagist](https://img.shields.io/packagist/v/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-sql-function-repository)
[![Total Downloads](https://img.shields.io/packagist/dt/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-sql-function-repository)
[![Code Quality](https://img.shields.io/scrutinizer/quality/g/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-sql-function-repository/?branch=main)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-sql-function-repository/?branch=main)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/michael-rubel/laravel-sql-function-repository/run-tests.yml?branch=main&style=flat-square&label=tests&logo=github)](https://github.com/michael-rubel/laravel-sql-function-repository/actions)
[![PHPStan](https://img.shields.io/github/actions/workflow/status/michael-rubel/laravel-sql-function-repository/phpstan.yml?branch=main&style=flat-square&label=larastan&logo=laravel)](https://github.com/michael-rubel/laravel-sql-function-repository/actions)

This package provides a repository class to run SQL functions available in the database.
Currently, only `PostgreSQL` database is supported, but if you want to add support for your database, contributions are welcomed.

---

The package requires `PHP 8` or higher and `Laravel 9` or higher.

## #StandWithUkraine
[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

## Installation
Install the package using composer:
```bash
composer require michael-rubel/laravel-sql-function-repository
```

Publish the config, set up basic connection and select:
```bash
php artisan vendor:publish --tag="sql-function-repository-config"
```

## Usage
```php
$repository = app(SqlFunctionRepository::class);
$repository->runDatabaseFunction('yourFunctionName', [
    'functionParameter1',
    'functionParameter2',
]);
```

## Testing
```bash
composer test
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
