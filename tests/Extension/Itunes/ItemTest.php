<?php

namespace Tests\MarcW\RssWriter\Extension\Itunes;

use MarcW\RssWriter\Extension\Itunes\Item;

class ItemTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $item = new Item();
        $item->setDuration('3:43:23')
             ->setIsClosedCaptionned(false)
             ->setOrder(3)
             ->setIsClosedCaptionned(true);

        $this->assertSame(3, $item->getOrder());
        $this->assertSame('3:43:23', $item->getDuration());
        $this->assertTrue($item->getIsClosedCaptionned());
    }
}
