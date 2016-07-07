<?php

namespace MarcW\RssWriter\Extension\Atom;

use MarcW\RssWriter\WriterRegistererInterface;
use MarcW\RssWriter\RssWriter;

/**
 * AtomWriter.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class AtomWriter implements WriterRegistererInterface
{
    public function getRegisteredWriters()
    {
        return [
            AtomLink::class => [$this, 'writeLink'],
        ];
    }

    public function getRegisteredNamespaces()
    {
        return [
            'atom' => 'http://www.w3.org/2005/Atom',
        ];
    }

    public function writeLink(RssWriter $rssWriter, AtomLink $link)
    {
        $writer = $rssWriter->getXmlWriter();

        $writer->startElement('atom:link');

        $writer->writeAttribute('href', $link->getHref());

        if ($link->getLength()) {
            $writer->writeAttribute('length', $link->getLength());
        }

        if ($link->getHreflang()) {
            $writer->writeAttribute('hreflang', $link->getHreflang());
        }

        if ($link->getRel()) {
            $writer->writeAttribute('rel', $link->getRel());
        }

        if ($link->getType()) {
            $writer->writeAttribute('type', $link->getType());
        }

        if ($link->getTitle()) {
            $writer->writeAttribute('title', $link->getTitle());
        }

        $writer->endElement();
    }
}
