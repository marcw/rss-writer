<?php

namespace MarcW\RssWriter\Extension\Sy;

use MarcW\RssWriter\Extension\Sy\Sy;
use MarcW\RssWriter\Extension\Sy\Writer;
use MarcW\RssWriter\RssWriter;

class WriterTest extends \PHPUnit_Framework_TestCase
{
    public function testWrite()
    {
        $writer = new Writer();
        $rssWriter = new RssWriter();

        $sy = new Sy();
        $sy->setUpdateFrequency(2);
        $sy->setUpdateBase(new \DateTime('2001-01-01', new \DateTimeZone('UTC')));
        $sy->setUpdatePeriod(Sy::PERIOD_DAILY);

        $writer->write($rssWriter, $sy);
        $this->assertSame(
            "<sy:updatePeriod>daily</sy:updatePeriod><sy:updateFrequency>2</sy:updateFrequency><sy:updateBase>2001-01-01T00:00:00+00:00</sy:updateBase>",
            $rssWriter->getXmlWriter()->flush()
        );
    }
}
