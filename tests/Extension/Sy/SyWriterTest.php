<?php

namespace MarcW\RssWriter\Extension\Sy;

use MarcW\RssWriter\Extension\Sy\Sy;
use MarcW\RssWriter\Extension\Sy\SyWriter;
use MarcW\RssWriter\RssWriter;

class SyWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testWrite()
    {
        $writer = new SyWriter();
        $rssWriter = new RssWriter();

        $sy = new Sy();
        $sy->setUpdateFrequency(2);
        $sy->setUpdateBase(new \DateTime('2001-01-01', new \DateTimeZone('UTC')));
        $sy->setUpdatePeriod(Sy::PERIOD_DAILY);

        $writer->write($rssWriter, $sy);
        $this->assertSame(
            "<sy:updatePeriod>daily</sy:updatePeriod><sy:updateFrequency>2</sy:updateFrequency><sy:updateBase>Mon, 01 Jan 2001 00:00:00 +0000</sy:updateBase>",
            $rssWriter->getXmlWriter()->flush()
        );
    }
}
