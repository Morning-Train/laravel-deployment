# Deployment

[![Latest Version on Packagist](https://img.shields.io/packagist/v/morningtrain/laravel-deployment.svg?style=flat-square)](https://packagist.org/packages/morningtrain/laravel-deployment)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/Morning-Train/laravel-deployment/run-tests?label=tests)](https://github.com/Morning-Train/laravel-deployment/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/Morning-Train/laravel-deployment/Check%20&%20fix%20styling?label=code%20style)](https://github.com/Morning-Train/laravel-deployment/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/morningtrain/laravel-deployment.svg?style=flat-square)](https://packagist.org/packages/morningtrain/laravel-deployment)

A package to parse a file for version/deployment information.

## Installation

You can install the package via composer:

```bash
composer require morningtrain/laravel-deployment
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="deployment-config"
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Deployment JSON File
    |--------------------------------------------------------------------------
    |
    | This value is the path to your JSON file. This value is used by the deployment
    | parser to know which JSON file to parse and look for deployment information,
    | to use in your application or provide services like Bugsnag or CI/CD.
    |
    */

    'file' => base_path() . '/deployment.json',
];
```

## Usage

Get the version number

```php
use Morningtrain\Deployment\Facades\Deployment;

Deployment::version();
```

Get the username of the committer

```php
Deployment::username();
```

Get the revision of the commit

```php
Deployment::revision();
```

Get the repository URL

```php
Deployment::repository();
```

Get all the data in a Version object

```php
Deployment::get();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Peter Brinck](https://github.com/peterbrinck)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
