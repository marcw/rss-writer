<?php

namespace MarcW\RssWriter\Extension\DublinCore;

use MarcW\RssWriter\WriterRegistererInterface;
use MarcW\RssWriter\RssWriter;

/**
 * Writer.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class Writer implements WriterRegistererInterface
{
    public function getRegisteredWriters()
    {
        return [
            DublinCore::class => [$this, 'writeDublinCore'],
        ];
    }

    public function getRegisteredNamespaces()
    {
        return [
            'dc' => 'http://purl.org/dc/elements/1.1/',
        ];
    }

    public function writeDublinCore(RssWriter $rssWriter, DublinCore $dc)
    {
        $writer = $rssWriter->getXmlWriter();

        $writer->startElement('dc:creator');
        $writer->writeCdata($dc->getCreator());
        $writer->endElement();
    }
}
