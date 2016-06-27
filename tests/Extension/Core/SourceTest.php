<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Source;

class SourceTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $source = new Source();
        $source->setUrl('https://example.com')
               ->setTitle('t')
               ->setTitle('Example Title');

        $this->assertEquals('https://example.com', $source->getUrl());
        $this->assertEquals('Example Title', $source->getTitle());
    }
}
