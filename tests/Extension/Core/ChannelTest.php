<?php

namespace Tests\MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\Extension\Core\Channel;
use MarcW\RssWriter\Extension\Core\Cloud;
use MarcW\RssWriter\Extension\Core\Image;
use MarcW\RssWriter\Extension\Core\Item;

class ChannelTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $channel = new Channel();

        $pubDate = new \DateTime('2001-01-01', new \DateTimeZone('UTC'));
        $lastBuildDate = new \DateTime('2001-01-01', new \DateTimeZone('UTC'));

        $item1 = new Item();
        $item2 = new Item();

        $ext1 = new \StdClass();
        $ext2 = new \StdClass();

        $cloud = new Cloud();
        $image = new Image();

        $channel->setTitle('My Title')
                ->setLink('https://www.example.com')
                ->setDescription('My Description')
                ->setLanguage('en')
                ->setCopyright('(c) 2016 Acme')
                ->setManagingEditor('John Doe <john.doe@example.com>')
                ->setWebMaster('Jane Doe <jane.doe@example.com')
                ->setPubDate($pubDate)
                ->setLastBuildDate($lastBuildDate)
                ->setDocs('http://example.com/rss2-spec')
                ->setGenerator('Generator v1')
                ->setCloud($cloud)
                ->setTtl(60)
                ->setImage($image)
                ->setRating('R')
                ->setItems([$item1])
                ->addItem($item2)
                ->setExtensions([$ext1])
                ->addExtension($ext2)
                ->setWebMaster('Jane Doe <jane.doe@example.com')
        ;

        $this->assertSame('My Title', $channel->getTitle());
        $this->assertSame('https://www.example.com', $channel->getLink());
        $this->assertSame('My Description', $channel->getDescription());
        $this->assertSame('en', $channel->getLanguage());
        $this->assertSame('(c) 2016 Acme', $channel->getCopyright());
        $this->assertSame('John Doe <john.doe@example.com>', $channel->getManagingEditor());
        $this->assertSame('Jane Doe <jane.doe@example.com', $channel->getWebMaster());
        $this->assertSame($pubDate, $channel->getPubDate());
        $this->assertSame($lastBuildDate, $channel->getLastBuildDate());
        $this->assertSame('http://example.com/rss2-spec', $channel->getDocs());
        $this->assertSame('Generator v1', $channel->getGenerator());
        $this->assertSame($cloud, $channel->getCloud());
        $this->assertSame(60, $channel->getTtl());
        $this->assertSame($image, $channel->getImage());
        $this->assertSame('R', $channel->getRating());
        $this->assertSame([$item1, $item2], $channel->getItems());
        $this->assertSame([$ext1, $ext2], $channel->getExtensions());
    }
}
