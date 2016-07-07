<?php

namespace Tests\MarcW\RssWriter\Extension\DublinCore;

use MarcW\RssWriter\Extension\DublinCore\DublinCore;

class DublinCoreTest extends \PHPUnit_Framework_TestCase
{
    public function testDublinCore()
    {
        $dc = new DublinCore();
        $dc->setCreator('M')
           ->setCreator('John Doe');

        $this->assertSame('John Doe', $dc->getCreator());
    }
}
