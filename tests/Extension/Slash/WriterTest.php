<?php

namespace MarcW\RssWriter\Extension\Slash;

use MarcW\RssWriter\Extension\Slash\Slash;
use MarcW\RssWriter\Extension\Slash\Writer;
use MarcW\RssWriter\RssWriter;

class WriterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $writer = new Writer();
        $rssWriter = new RssWriter();

        $slash = new Slash();
        $slash->setSection('Articles')
              ->setDepartment('News')
              ->setHitParade('123,124,125')
              ->setComments(432);

        $writer->write($rssWriter, $slash);

        $this->assertSame(
            "<slash:section><![CDATA[Articles]]></slash:section><slash:department><![CDATA[News]]></slash:department><slash:comments>432</slash:comments><slash:hitParade>123,124,125</slash:hitParade>",
            $rssWriter->getXmlWriter()->flush()
        );
    }
}
