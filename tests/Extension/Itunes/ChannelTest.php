<?php

namespace Tests\Marcw\RssWriter\Extension\Itunes;

use MarcW\RssWriter\Extension\Itunes\Channel;
use MarcW\RssWriter\Extension\Itunes\Owner;

class ChannelTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $channel = new Channel();
        $channel->setAuthor('Jane Doe')
                ->setBlock(true)
                ->setImage('https://link.to/my_image.jpg')
                ->setExplicit(true)
                ->setSubtitle('The Subtitle')
                ->setComplete(true)
                ->setOwner((new Owner())->setName('John Doe')->setEmail('john.doe@example.com'))
                ->setCategories(['cat1', 'cat2'])
                ->addCategory('cat3')
                ->setAuthor('John Doe');

        $this->assertSame('John Doe', $channel->getAuthor());
        $this->assertTrue($channel->getBlock());
        $this->assertSame('https://link.to/my_image.jpg', $channel->getImage());
        $this->assertTrue($channel->getExplicit());
        $this->assertSame('The Subtitle', $channel->getSubtitle());
        $this->assertTrue($channel->getComplete());
        $this->assertSame('John Doe', $channel->getOwner()->getName());
        $this->assertSame('john.doe@example.com', $channel->getOwner()->getEmail());
        $this->assertSame(['cat1', 'cat2', 'cat3'], $channel->getCategories());
    }
}
