<?php

namespace Tests\MarcW\RssWriter\Extension\Sy;

use MarcW\RssWriter\Extension\Sy\Sy;

class SyTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $sy = new Sy();

        $base = new \DateTime('2000-01-01');
        $sy->setUpdatePeriod(Sy::PERIOD_HOURLY)
           ->setUpdateFrequency(4)
           ->setUpdateBase($base)
           ->setUpdateFrequency(1)   // in order to test fluent interface
        ;

        $this->assertSame(Sy::PERIOD_HOURLY, $sy->getUpdatePeriod());
        $this->assertSame(1, $sy->getUpdateFrequency());
        $this->assertSame($base, $sy->getUpdateBase());

        $sy->setUpdateBase(null);
        $this->assertNull($sy->getUpdateBase());
    }
}
