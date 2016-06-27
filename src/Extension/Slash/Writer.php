<?php

namespace MarcW\RssWriter\Extension\Slash;

use MarcW\RssWriter\WriterRegistererInterface;
use MarcW\RssWriter\RssWriter;

class Writer implements WriterRegistererInterface
{
    public function getRegisteredWriters()
    {
        return [
            Slash::class => [$this, 'write'],
        ];
    }

    public function getRegisteredNamespaces()
    {
        return [
            'slash' => 'http://purl.org/rss/1.0/modules/slash/',
        ];
    }

    public function write(RssWriter $rssWriter, Slash $slash)
    {
        $writer = $rssWriter->getXmlWriter();

        if ($slash->getSection()) {
            $writer->startElement('slash:section');
            $writer->writeCData($slash->getSection());
            $writer->endElement();
        }

        if ($slash->getDepartment()) {
            $writer->startElement('slash:department');
            $writer->writeCData($slash->getDepartment());
            $writer->endElement();
        }

        if ($slash->getComments()) {
            $writer->writeElement('slash:comments', $slash->getComments());
        }

        if ($slash->getHitParade()) {
            $writer->writeElement('slash:hitParade', $slash->getHitParade());
        }
    }
}
