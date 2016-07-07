<?php

namespace MarcW\RssWriter\Extension\Sy;

use MarcW\RssWriter\WriterRegistererInterface;
use MarcW\RssWriter\RssWriter;

class SyWriter implements WriterRegistererInterface
{
    public function getRegisteredWriters()
    {
        return [
            Sy::class => [$this, 'write'],
        ];
    }

    public function getRegisteredNamespaces()
    {
        return [
            'sy' => 'http://purl.org/rss/1.0/modules/syndication/',
        ];
    }

    public function write(RssWriter $rssWriter, Sy $extension)
    {
        $writer = $rssWriter->getXmlWriter();

        if ($extension->getUpdatePeriod()) {
            $writer->writeElement('sy:updatePeriod', $extension->getUpdatePeriod());
        }

        if ($extension->getUpdateFrequency()) {
            $writer->writeElement('sy:updateFrequency', $extension->getUpdateFrequency());
        }

        if ($extension->getUpdateBase()) {
            $writer->writeElement('sy:updateBase', $extension->getUpdateBase()->format('r'));
        }
    }
}
