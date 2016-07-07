<?php

namespace Tests\MarcW\RssWriter\Extension\Atom;

use MarcW\RssWriter\Extension\Atom\Link;
use MarcW\RssWriter\Extension\Atom\Writer;
use MarcW\RssWriter\RssWriter;

/**
 * .
 *
 * @author Marc Weistroff <marc.weistroff@sensio.com>
 */
class WriterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $writer = new Writer();
        $rssWriter = new RssWriter();

        $link = new Link();
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
