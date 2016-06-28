<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Item;
use MarcW\RssWriter\Extension\Core\Enclosure;
use MarcW\RssWriter\Extension\Core\Source;
use MarcW\RssWriter\Extension\Core\Guid;

class ItemTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $item = new Item();

        $enclosure = (new Enclosure())->setUrl('https://example.com/enclosure.mp3')->setLength(123)->setType('audio/mp3');
        $source = (new Source())->setUrl('https://example.com')->setTitle('My Source');
        $pubDate = new \DateTime(2001-01-01, new \DateTimeZone('UTC'));

        $guid = new Guid();

        $ext1 = new \StdClass();
        $ext2 = new \StdClass();

        $item->setTitle('My Title')
            ->setLink('https://example.com/my-title')
            ->setDescription('My Description')
            ->setAuthor('John Doe <john.doe@example.com')
            ->setComments('https://example.com/my-title#comments')
            ->setEnclosure($enclosure)
            ->setPubDate($pubDate)
            ->setSource($source)
            ->setCategories(['cat1', 'cat2'])
            ->addCategory('cat3')
            ->setExtensions([$ext1])
            ->addExtension($ext2)
            ->setGuid($guid)
        ;

        $this->assertEquals('My Title', $item->getTitle());
        $this->assertEquals('https://example.com/my-title', $item->getLink());
        $this->assertEquals('My Description', $item->getDescription());
        $this->assertEquals('John Doe <john.doe@example.com', $item->getAuthor());
        $this->assertEquals('https://example.com/my-title#comments', $item->getComments());
        $this->assertSame($enclosure, $item->getEnclosure());
        $this->assertSame(['cat1', 'cat2', 'cat3'], $item->getCategories());
        $this->assertSame([$ext1, $ext2], $item->getExtensions());
        $this->assertSame($guid, $item->getGuid());
        $this->assertSame($pubDate, $item->getPubDate());
        $this->assertSame($source, $item->getSource());
    }
}
