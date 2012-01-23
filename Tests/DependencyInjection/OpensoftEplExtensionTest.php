<?php
/*
 * This file is part of the OpensoftEplBundle package.
 *
 * Copyright (c) 2011 Farheap Solutions (http://www.farheap.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opensoft\EplBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

use Opensoft\EplBundle\DependencyInjection\OpensoftEplExtension;

/**
 * OpensoftEplExtension test.
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru><fightmaster>
 */
class OpensoftEplExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $container;
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new OpensoftEplExtension();
    }

    public function tearDown()
    {
        unset($this->container, $this->extension);
    }

    public function testLoadHelper()
    {
        $helper= 'Epl\HelperCommandTest';
        $config = array(
            'opensoft_epl' => array('helper' => $helper)
        );
        $this->extension->load($config, $this->container);
        $this->assertDefinition('opensoft_epl.helper', 'opensoft_epl.helper.class', array('opensoft_epl.composite'));
        $this->assertParameter($helper, 'opensoft_epl.helper.class');
    }

    public function testLoadHelperWithDefaults()
    {
        $this->extension->load(array(), $this->container);
        $helper = 'Epl\CommandHelper';

        $this->assertDefinition('opensoft_epl.helper', 'opensoft_epl.helper.class', array('opensoft_epl.composite'));
        $this->assertParameter($helper, 'opensoft_epl.helper.class');
    }

    public function testLoadComposite()
    {
        $helper= 'Epl\CompositeCommandTest';
        $config = array(
            'opensoft_epl' => array('composite' => $helper)
        );
        $this->extension->load($config, $this->container);
        $this->assertDefinition('opensoft_epl.composite', 'opensoft_epl.composite.class');
        $this->assertParameter($helper, 'opensoft_epl.composite.class');
    }

    public function testLoadCompositeWithDefaults()
    {
        $this->extension->load(array(), $this->container);
        $helper = 'Epl\CommandComposite';
        $this->assertDefinition('opensoft_epl.composite', 'opensoft_epl.composite.class');
        $this->assertParameter($helper, 'opensoft_epl.composite.class');
    }

    private function assertParameter($value, $key)
    {
        $this->assertEquals($value, $this->container->getParameter($key), sprintf('%s parameter is correct', $key));
    }

    private function assertDefinition($definitionName, $definitionClass, $expectedArguments = array())
    {
        $this->assertTrue($this->container->hasDefinition($definitionName));
        $loader = $this->container->getDefinition($definitionName);
        $this->assertEquals('%' . $definitionClass . '%', $loader->getClass());
        $arguments = $loader->getArguments();
        $this->assertEquals(count($expectedArguments), count($arguments));
        $this->assertEquals($expectedArguments, $arguments);
    }
}
