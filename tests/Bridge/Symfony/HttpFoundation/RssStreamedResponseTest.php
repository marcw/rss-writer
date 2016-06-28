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

        $this->expectOutputString(<<<EOF
<?xml version="1.0"?>
<rss version="2.0"><channel><title><![CDATA[My Title]]></title><link>http://www.example.com</link><description><![CDATA[My Description]]></description></channel></rss>
EOF
);
        $response->sendContent();
    }
}
