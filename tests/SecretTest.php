<?php
namespace Opine;

use PHPUnit_Framework_TestCase;
use Opine\Container\Service as Container;
use Opine\Config\Service as Config;

class SecretTest extends PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $root = __DIR__.'/../public';
        $config = new Config($root);
        $container = Container::instance($root, $config, $root.'/../config/containers/test-container.yml');
    }

    public function testSample()
    {
        $this->assertTrue(true);
    }
}
