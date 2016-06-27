<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Cloud;

class CloudTest extends \PHPUnit_Framework_TestCase
{
    public function testCloud()
    {
        $cloud = new Cloud();
        $cloud->setDomain('example.com')
            ->setPort(80)
            ->setPath('/')
            ->setRegisterProcedure('myProcedure')
            ->setProtocol('http')
            ->setProtocol('soap');

        $this->assertEquals('example.com', $cloud->getDomain());
        $this->assertEquals(80, $cloud->getPort());
        $this->assertEquals('/', $cloud->getPath());
        $this->assertEquals('myProcedure', $cloud->getRegisterProcedure());
        $this->assertEquals('soap', $cloud->getProtocol());
    }
}
