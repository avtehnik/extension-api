# AppShed Extension API

This is the api for remote screens.

[![Latest Stable Version](https://poser.pugx.org/appshed/extension-api/v/stable.png)](https://packagist.org/packages/appshed/extension-api)
[![License](https://poser.pugx.org/appshed/extension-api/license.png)](https://packagist.org/packages/appshed/extension-api)
[![Build Status](https://travis-ci.org/AppShed/extension-api.svg?branch=master)](https://travis-ci.org/AppShed/extension-api)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/58e6715f-74f8-4537-9be8-0b113cfcdbb2/mini.png)](https://insight.sensiolabs.com/projects/58e6715f-74f8-4537-9be8-0b113cfcdbb2)

## Installing

### Composer

You can install the API in your project just run `composer require appshed/extension-api`.

### Phar

If you don't want to use composer, you can [download the phar](https://raw.githubusercontent.com/AppShed/extension-api/master/build/appshed-api.phar).
This is a package of everything you need, you just need to `require_once 'appshed-api.phar'`.
Look in the `phar-examples` folder to see how it might be used.

## Examples

Be sure to run `composer install` if you want to run the examples from this repo.

## Docs

You can see the api docs on [github pages](http://appshed.github.io/extension-api/).

## Contributing

### Phar

Please be sure to update the phar before committing. You need to use [Box](http://box-project.org/) to do this.

To build the phar:

    ./vendor/bin/box build -v

### Docs

The API doc is built using [sami](https://github.com/fabpot/sami).

To generate the API doc:
    
    ./vendor/bin/sami.php update sami.php 

You can then commit the doc folder to the `gh-pages` branch, something like:

    mv doc ~/doc-tmp
    git checkout gh-pages
    rm -rf .
    mv ~/doc-tmp/* .
    git add .
    git commit
    
### Tests

To run the tests 

    ./vendor/bin/phpunit
