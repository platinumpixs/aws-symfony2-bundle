<?php

require_once 'vendor/autoload.php';

use \Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespaces(array(
    'PlatinumPixs\Aws' => __DIR__ . '/../src',
));

$loader->register();