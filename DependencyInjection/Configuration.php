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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * OpensoftEplExtension test.
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru><fightmaster>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('opensoft_epl');

        $rootNode
            ->children()
                ->scalarNode('composite')->defaultValue('Epl\CommandComposite')->end()
                ->scalarNode('helper')->defaultValue('Epl\CommandHelper')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
