<?php

namespace MarcW\RssWriter\Extension\DublinCore;

use MarcW\RssWriter\Extension\DublinCore\DublinCore;
use MarcW\RssWriter\Extension\DublinCore\DublinCoreWriter;
use MarcW\RssWriter\RssWriter;

class DublinCoreWriterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $writer = new DublinCoreWriter();
        $rssWriter = new RssWriter();

        $dc = new DublinCore();
        $dc->setCreator('John Doe');

        $writer->writeDublinCore($rssWriter, $dc);

        $this->assertSame(
            "<dc:creator><![CDATA[John Doe]]></dc:creator>",
            $rssWriter->getXmlWriter()->flush()
        );
    }
}

