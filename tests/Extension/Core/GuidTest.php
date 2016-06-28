<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Guid;

class GuidTest extends \PHPUnit_Framework_TestCase
{
    public function testGuid()
    {
        $guid = new Guid();
        $guid->setIsPermaLink(false)
             ->setGuid('http://www.example.com')
             ->setIsPermalink(true);

        $this->assertTrue($guid->getIsPermaLink());
        $this->assertEquals('http://www.example.com', $guid->getGuid());
    }
}
