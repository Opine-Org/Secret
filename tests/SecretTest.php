<?php
namespace Opine;
use PHPUnit_Framework_TestCase;

class SecretTest extends PHPUnit_Framework_TestCase {
    public function setup () {
        $root = __DIR__ . '/../public';
        $container = new Container($root, $root . '/../container.yml');
    }

    public function testSample () {
        $this->assertTrue(true);
    }
}