<?php

namespace Tests\Marcw\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Image;

class ImageTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $image = new Image();
        $image->setUrl('https://example.com/img.jpg')
              ->setTitle('Example Image')
              ->setLink('https://example.com')
              ->setWidth(133)
              ->setHeight(133)
              ->setHeight(146)
        ;

        $this->assertEquals('https://example.com/img.jpg', $image->getUrl());
        $this->assertEquals('Example Image', $image->getTitle());
        $this->assertEquals('https://example.com', $image->getLink());
        $this->assertEquals(133, $image->getWidth());
        $this->assertEquals(146, $image->getHeight());
    }
}
