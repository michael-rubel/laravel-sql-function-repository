![Laravel SQL Function Repository](https://user-images.githubusercontent.com/37669560/161713670-e6d795c0-9ddf-4458-9eb5-d596a5b9399c.png)

# Laravel SQL Function Repository
[![Latest Version on Packagist](https://img.shields.io/packagist/v/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-sql-function-repository)
[![Total Downloads](https://img.shields.io/packagist/dt/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-sql-function-repository)
[![Code Quality](https://img.shields.io/scrutinizer/quality/g/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-sql-function-repository/?branch=main)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/michael-rubel/laravel-sql-function-repository.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-sql-function-repository/?branch=main)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/michael-rubel/laravel-sql-function-repository/run-tests/main?style=flat-square&label=tests&logo=github)](https://github.com/michael-rubel/laravel-sql-function-repository/actions)
[![PHPStan](https://img.shields.io/github/workflow/status/michael-rubel/laravel-sql-function-repository/phpstan/main?style=flat-square&label=larastan&logo=laravel)](https://github.com/michael-rubel/laravel-sql-function-repository/actions)

This packages provides repository class to execute SQL functions available in the PostgreSQL database.

---

The package requires PHP `^8.x` and Laravel `^8.71` or `^9.0`.

## #StandWithUkraine
[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

## Installation
Install the package using composer:
```bash
composer require michael-rubel/laravel-sql-function-repository
```

## Usage
```php
$repository = app(SqlFunctionRepository::class);
$repository->runDatabaseFunction('yourFunctionName', [
    'functionParameter1',
    'functionParameter2',
]);
```

Publish the config:
```bash
php artisan vendor:publish --tag="sql-function-repository-config"
```

## Testing
```bash
composer test
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
