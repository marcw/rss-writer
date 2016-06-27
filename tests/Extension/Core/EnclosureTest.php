<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Enclosure;

class EnclosureTest extends \PHPUnit_Framework_TestCase
{
    public function testEnclosure()
    {
        $enclosure = new Enclosure();
        $enclosure->setUrl('https://example.com/audio.mp3')
                  ->setLength(123)
                  ->setType('audio/wave')
                  ->setType('audio/mp3')
        ;

        $this->assertEquals('https://example.com/audio.mp3', $enclosure->getUrl());
        $this->assertEquals(123, $enclosure->getLength());
        $this->assertEquals('audio/mp3', $enclosure->getType());
    }
}
