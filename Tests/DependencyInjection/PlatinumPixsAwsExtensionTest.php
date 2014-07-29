<?php
/**
 * Platinum Pixs
 *
 * @copyright  Copyright (c) 2010-2013, Platinum Pixs, LLC All rights reserved.
 * @link       http://www.platinumpixs.com
 */

namespace PlatinumPixs\Aws\Tests\DependencyInjection;

use \PlatinumPixs\Aws\DependencyInjection\PlatinumPixsAwsExtension,
    \Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * XXX
 *
 * @copyright  Copyright (c) 2010-2013, Platinum Pixs, LLC All rights reserved.
 * @link       http://www.platinumpixs.com
 */
class PlatinumPixsAwsExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $container;

    /**
     * @var \PlatinumPixs\Aws\DependencyInjection\PlatinumPixsAwsExtension
     */
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new PlatinumPixsAwsExtension();
    }

    public function testDefaultSetup()
    {
        $this->extension->load(array(), $this->container);

        $this->assertInstanceOf('Guzzle\Service\Builder\ServiceBuilder', $this->container->get('platinum_pixs_aws.default'));
    }


    public function testBaseSetup()
    {
        $config = array(
            'standard' => array(
                'key'    => '<aws access key>',
                'secret' => '<aws secret key>',
                'region' => '<region name>'
            )
        );

        $this->extension->load(array($config), $this->container);

        $this->assertInstanceOf('Guzzle\Service\Builder\ServiceBuilder', $this->container->get('platinum_pixs_aws.standard'));
    }


    public function testBaseSetupWithKeyandSecret()
    {
        $config = array(
            'standard' => array(
                'region' => '<region name>'
            )
        );

        $this->extension->load(array($config), $this->container);

        $this->assertInstanceOf('Guzzle\Service\Builder\ServiceBuilder', $this->container->get('platinum_pixs_aws.standard'));
    }

}
