<?php

namespace Tests\MarcW\RssWriter\Extension\Itunes;

use MarcW\RssWriter\Extension\Itunes\Owner;

class OwnerTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $owner = new Owner();
        $owner->setEmail('barfoo@example.com')
              ->setName('Foo Bar')
              ->setEmail('foobar@example.com')
        ;

        $this->assertSame('Foo Bar', $owner->getName());
        $this->assertSame('foobar@example.com', $owner->getEmail());
    }
}
