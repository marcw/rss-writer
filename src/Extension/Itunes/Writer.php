<?php

namespace MarcW\RssWriter\Extension\Itunes;

use MarcW\RssWriter\RssWriter;
use MarcW\RssWriter\WriterRegistererInterface;

class Writer implements WriterRegistererInterface
{
    public function getRegisteredWriters()
    {
        return [
            Channel::class => [$this, 'writeChannel'],
            Item::class => [$this, 'writeItem'],
        ];
    }

    public function getRegisteredNamespaces()
    {
        return [
            'itunes' => 'http://www.itunes.com/dtds/podcast-1.0.dtd',
        ];
    }

    public function writeChannel(RssWriter $rssWriter, Channel $channel)
    {
        $writer = $rssWriter->getXmlWriter();

        $this->writeCommon($writer, $channel);

        if ($channel->getComplete()) {
            $writer->writeElement('itunes:complete', 'Yes');
        }

        if ($channel->getOwner()) {
            $owner = $channel->getOwner();
            $writer->startElement('itunes:owner');
            $writer->startElement('itunes:name');
            $writer->writeCdata($owner->getName());
            $writer->endElement();
            $writer->writeElement('itunes:email', $owner->getEmail());
            $writer->endElement();
        }

        foreach ($channel->getCategories() as $category) {
            if (is_array($category)) {
                list($parent, $child) = $category;
                $writer->startElement('itunes:category');
                $writer->writeAttribute('text', $parent);
                $writer->startElement('itunes:category');
                $writer->writeAttribute('text', $child);
                $writer->endElement();
                $writer->endElement();
            } else {
                $writer->startElement('itunes:category');
                $writer->writeAttribute('text', $category);
                $writer->endElement();
            }
        }
    }

    public function writeItem(RssWriter $rssWriter, Item $item)
    {
        $writer = $rssWriter->getXmlWriter();
        $this->writeCommon($writer, $item);

        if ($item->getDuration()) {
            $writer->writeElement('itunes:duration', $item->getDuration());
        }

        if ($item->getIsClosedCaptionned()) {
            $writer->writeElement('itunes:isClosedCaption', 'Yes');
        }

        if ($item->getOrder()) {
            $writer->writeElement('itunes:order', $item->getOrder());
        }
    }

    private function writeCommon(\XMLWriter $writer, Common $common)
    {
        if ($common->getAuthor()) {
            $writer->startElement('itunes:author');
            $writer->writeCdata($common->getAuthor());
            $writer->endElement();
        }

        if ($common->getSummary()) {
            $writer->startElement('itunes:summary');
            $writer->writeCdata($common->getSummary());
            $writer->endElement();
        }

        if ($common->getBlock()) {
            $writer->writeElement('itunes:block', 'Yes');
        }

        if ($common->getImage()) {
            $writer->startElement('itunes:image');
            $writer->writeAttribute('href', $common->getImage());
            $writer->endElement();
        }

        if ($common->getExplicit()) {
            $writer->writeElement('itunes:explicit', 'Yes');
        }

        if ($common->getSubtitle()) {
            $writer->startElement('itunes:subtitle');
            $writer->writeCdata($common->getSubtitle());
            $writer->endElement();
        }
    }
}
