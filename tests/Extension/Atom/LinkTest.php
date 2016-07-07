<?php

namespace Tests\MarcW\RssWriter\Extension\Atom;

use MarcW\RssWriter\Extension\Atom\Link;

class LinkTest extends \PHPUnit_Framework_TestCase
{
    public function testLink()
    {
        $link = new Link();
        $link->setHref('http://www.example.com')
             ->setLength(45)
             ->setHreflang('en')
             ->setRel('self')
             ->setType('application/xml')
             ->setTitle('My Title')
             ->setTitle('Our Title')
        ;

        $this->assertSame('http://www.example.com', $link->getHref());
        $this->assertSame(45, $link->getLength());
        $this->assertSame('en', $link->getHreflang());
        $this->assertSame('self', $link->getRel());
        $this->assertSame('application/xml', $link->getType());
        $this->assertSame('Our Title', $link->getTitle());
    }
}
