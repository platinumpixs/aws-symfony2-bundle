AWS SDK 2 - Symfony 2 Bundle
===================

Provides a simple Symfony 2 Bundle to Wrap the AWS PHP SDK 2 - https://github.com/aws/aws-sdk-php

## Installing via Composer

```json
{
    "require": {
        "platinumpixs/aws-symfony2-bundle": "dev-master"
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
        access_key: my-access-key
        secret_key: my-secret-key
```

Then to access this setup call:

```php
$this->get('platinum_pixs_aws.base');
```
