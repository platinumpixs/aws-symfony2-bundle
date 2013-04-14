<?php
/**
 * Copyright 2013 Platinum Pixs, LLC. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace PlatinumPixs\Aws\DependencyInjection;

use \Symfony\Component\DependencyInjection\ContainerBuilder,
    \Symfony\Component\HttpKernel\DependencyInjection\Extension,
    \Symfony\Component\DependencyInjection\Definition,
    \Symfony\Component\DependencyInjection\ContainerInterface,
    \Symfony\Component\Config\FileLocator,
    \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class PlatinumPixsAwsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('platinum_pixs_aws.xml');

        $configs = $this->processConfiguration(new Configuration(), $configs);

        $configs['default'] = array();

        foreach ($configs as $name => $config)
        {
            $definition = new Definition('%platinum_pixs_aws.class%');
            $definition->setFactoryClass('%platinum_pixs_aws.class%')
                ->setFactoryMethod('factory')
                ->setArguments(array($config));

            $container->setDefinition('platinum_pixs_aws.' . $name, $definition);
        }
    }

    public function getAlias()
    {
        return 'platinum_pixs_aws';
    }
}
