<?php

namespace MarcW\RssWriter\Extension\Slash;

use MarcW\RssWriter\Extension\Slash\Slash;
use MarcW\RssWriter\Extension\Slash\SlashWriter;
use MarcW\RssWriter\RssWriter;

class SlashWriterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $writer = new SlashWriter();
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
