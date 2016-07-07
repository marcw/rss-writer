<?php

namespace Tests\MarcW\RssWriter\Extension\Atom;

use MarcW\RssWriter\Extension\Atom\AtomLink;
use MarcW\RssWriter\Extension\Atom\AtomWriter;
use MarcW\RssWriter\RssWriter;

class AtomWriterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $writer = new AtomWriter();
        $rssWriter = new RssWriter();

        $link = new AtomLink();
        $link->setHref('http://www.example.com')
             ->setHreflang('en')
             ->setLength(45)
             ->setRel('self')
             ->setType('application/xml')
             ->setTitle('Our Title')
        ;

        $writer->writeLink($rssWriter, $link);

        $expected = <<<EOF
<atom:link href="http://www.example.com" length="45" hreflang="en" rel="self" type="application/xml" title="Our Title"/>
EOF
        ;

        $this->assertSame(
            $expected,
            $rssWriter->getXmlWriter()->flush()
        );
    }
}
