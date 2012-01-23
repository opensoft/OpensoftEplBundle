<?php
/*
 * This file is part of the OpensoftEplBundle package.
 *
 * Copyright (c) 2011 Farheap Solutions (http://www.farheap.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Opensoft\EplBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * OpensoftEplExtension test.
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru><fightmaster>
 */
class OpensoftEplExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter($this->getAlias() . '.helper.class', $config['helper']);
        $container->setParameter($this->getAlias() . '.composite.class', $config['composite']);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
