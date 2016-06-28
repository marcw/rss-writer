<?php

namespace Tests\MarcW\RssWriter\Bridge\Symfony\HttpFoundation;

use MarcW\RssWriter\Extension\Core\Channel;
use MarcW\RssWriter\Bridge\Symfony\HttpFoundation\RssStreamedResponse;

class RssStreamedResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testStreamResponse()
    {
        $channel = new Channel();
        $channel->setTitle('My Title')
                ->setLink('http://www.example.com')
                ->setDescription('My Description');

        $response = new RssStreamedResponse($channel);

        $this->expectOutputString('<rss version="2.0"><title><![CDATA[My Title]]></title><link>My Title</link><description><![CDATA[My Description]]></description></rss>');
        $response->sendContent();
    }
}
