<?php

namespace MarcW\RssWriter\Bridge\Symfony\HttpFoundation;

use MarcW\RssWriter\Extension\Core\Channel;
use MarcW\RssWriter\Extension\Core\Writer as CoreWriter;
use MarcW\RssWriter\RssWriter;
use Symfony\Component\HttpFoundation\Response;

class RssStreamedResponse extends Response
{
    protected $channel;
    protected $rssWriter;
    protected $streamed;

    public function __construct(Channel $channel, RssWriter $rssWriter = null, $status = 200, $headers = [])
    {
        parent::__construct(null, 200, []);

        $this->channel = $channel;
        $this->rssWriter = $rssWriter;

        if (null === $this->rssWriter) {
            $this->rssWriter = new RssWriter();
            $this->rssWriter->setFlushEearly(true);
            $this->rssWriter->registerWriter(new CoreWriter());
            $this->rssWriter->getXmlWriter()->openUri('php://output');
        }
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the content once.
     */
    public function sendContent()
    {
        if ($this->streamed) {
            return;
        }

        $this->streamed = true;

        return $this->rssWriter->writeChannel($this->channel);
    }

    public function setContent($content)
    {
        if (null !== $content) {
            throw new \LogicException('The content cannot be set on a RssStreamedResponse instance.');
        }
    }

    public function getContent()
    {
        return false;
    }
}
