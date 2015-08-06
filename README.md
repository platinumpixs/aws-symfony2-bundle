AWS SDK 2 - Symfony 2 Bundle
===================

[![Build Status](https://travis-ci.org/platinumpixs/aws-symfony2-bundle.svg?branch=master)](https://travis-ci.org/platinumpixs/aws-symfony2-bundle)[![Latest Stable Version](https://poser.pugx.org/platinumpixs/aws-symfony2-bundle/v/stable.svg)](https://packagist.org/packages/platinumpixs/aws-symfony2-bundle) [![Total Downloads](https://poser.pugx.org/platinumpixs/aws-symfony2-bundle/downloads.svg)](https://packagist.org/packages/platinumpixs/aws-symfony2-bundle) [![Latest Unstable Version](https://poser.pugx.org/platinumpixs/aws-symfony2-bundle/v/unstable.svg)](https://packagist.org/packages/platinumpixs/aws-symfony2-bundle) [![License](https://poser.pugx.org/platinumpixs/aws-symfony2-bundle/license.svg)](https://packagist.org/packages/platinumpixs/aws-symfony2-bundle)

Provides a simple Symfony 2 Bundle to Wrap the AWS PHP SDK 2 - https://github.com/aws/aws-sdk-php

## Installing via Composer

This will install Version 3 of the SDK.

```json
{
    "require": {
        "platinumpixs/aws-symfony2-bundle": "dev-master"
    }
}
```

If you with to stay on older Version 2 of the SDK.

```json
{
    "require": {
        "platinumpixs/aws-symfony2-bundle": "1.2.0"
    }
}
```

## Using and Setting Up

### autoload.php
```php
$loader->registerNamespaces(
  'PlatinumPixs'                  => __DIR__ . '/../vendor/platinumpixs'
)
```

### Kernel.php
```php
public function registerBundles() {
  $bundles = array(
    new PlatinumPixs\Aws\PlatinumPixsAwsBundle()
  );
}
```

The code calls \Aws\Common\Aws::factory(), which setups the ability to call all the services provided by the library

There is a base class always setup under:

```php
$this->get('platinum_pixs_aws.default');
```

This will call the factory method with blank config values

To provide custom setup for access, secret keys. Add a config options in your config.yml, like:

```yaml
platinum_pixs_aws:
    base:
        region: us-east-1
        key: my-access-key
        secret: my-secret-key
```

Then to access this setup call:

```php
$this->get('platinum_pixs_aws.base');
```
