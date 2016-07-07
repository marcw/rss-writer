<?php

namespace Tests\MarcW\RssWriter\Extension\Itunes;

use MarcW\RssWriter\Extension\Itunes\ItunesOwner;

class ItunesOwnerTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $owner = new ItunesOwner();
        $owner->setEmail('barfoo@example.com')
              ->setName('Foo Bar')
              ->setEmail('foobar@example.com')
        ;

        $this->assertSame('Foo Bar', $owner->getName());
        $this->assertSame('foobar@example.com', $owner->getEmail());
    }
}
