# UNDER CONSTRUCTION package scout-phpmorphy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/visual-ideas/scout-phpmorphy.svg?style=flat-square)](https://packagist.org/packages/visual-ideas/scout-phpmorphy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/visual-ideas/scout-phpmorphy/run-tests?label=tests)](https://github.com/visual-ideas/scout-phpmorphy/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/visual-ideas/scout-phpmorphy/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/visual-ideas/scout-phpmorphy/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/visual-ideas/scout-phpmorphy.svg?style=flat-square)](https://packagist.org/packages/visual-ideas/scout-phpmorphy)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

<!---
## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/scout-phpmorphy.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/scout-phpmorphy)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).
-->

## Installation

You can install the package via composer:

```bash
composer require visual-ideas/scout-phpmorphy
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="scout-phpmorphy-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="scout-phpmorphy-config"
```

This is the contents of the published config file:

```php
return [

    'table_prefix' => 'phpmorphy_',

    'min_word_length' => 2,

];
```

<!---
Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="scout-phpmorphy-views"
```

    'driver' => env('SCOUT_DRIVER', 'phpmorphy'),

## Usage

```php
$scoutPhpmorphy = new VI\ScoutPhpmorphy();
echo $scoutPhpmorphy->echoPhrase('Hello, VI!');
```
-->

<!---
## Testing

```bash
composer test
```
-->

<!----
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.
-->

## Credits

- [AlexVenga](https://github.com/visual-ideas)
<!----- [All Contributors](../../contributors)-->

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


only integer keys
