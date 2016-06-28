<?php

namespace MarcW\RssWriter\Extension\Core;

use MarcW\RssWriter\WriterRegistererInterface;
use MarcW\RssWriter\RssWriter;

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
        return [];
    }

    public function writeChannel(RssWriter $rssWriter, Channel $channel)
    {
        $writer = $rssWriter->getXmlWriter();
        $writer->startElement('channel');

        $writer->startElement('title');
        $writer->writeCdata($channel->getTitle());
        $writer->endElement();

        $writer->writeElement('link', $channel->getLink());

        $writer->startElement('description');
        $writer->writeCdata($channel->getDescription());
        $writer->endElement();

        if ($channel->getLanguage()) {
            $writer->writeElement('language', $channel->getLanguage());
        }

        if ($channel->getCopyright()) {
            $writer->startElement('copyright');
            $writer->writeCdata($channel->getCopyright());
            $writer->endElement();
        }

        if ($channel->getManagingEditor()) {
            $writer->startElement('managingEditor');
            $writer->writeCdata($channel->getManagingEditor());
            $writer->endElement();
        }

        if ($channel->getWebMaster()) {
            $writer->startElement('webMaster');
            $writer->writeCdata($channel->getWebMaster());
            $writer->endElement();
        }

        if ($channel->getPubDate()) {
            $writer->writeElement('pubDate', $channel->getPubDate()->format('r'));
        }

        if ($channel->getLastBuildDate()) {
            $writer->writeElement('lastBuildDate', $channel->getLastBuildDate()->format('r'));
        }

        foreach ($channel->getCategories() as $category) {
            $this->writeCategory($writer, $category);
        }

        if ($channel->getGenerator()) {
            $writer->startElement('generator');
            $writer->writeCdata($channel->getGenerator());
            $writer->endElement();
        }

        if ($channel->getDocs()) {
            $writer->writeElement('docs', $channel->getDocs());
        }

        if ($channel->getCloud()) {
            $this->writeCloud($writer, $channel->getCloud());
        }

        if ($channel->getTtl()) {
            $writer->writeElement('ttl', $channel->getTtl());
        }

        if ($channel->getImage()) {
            $this->writeImage($writer, $channel->getImage());
        }

        if ($channel->getRating()) {
            $writer->writeElement('rating', $channel->getRating());
        }

        foreach ($channel->getExtensions() as $extension) {
            $rssWriter->writeObject($extension);
        }

        foreach ($channel->getItems() as $item) {
            $rssWriter->writeObject($item);
        }

        $writer->endElement();
    }

    public function writeItem(RssWriter $rssWriter, Item $item)
    {
        $writer = $rssWriter->getXmlWriter();
        $writer->startElement('item');

        $writer->startElement('title');
        $writer->writeCdata($item->getTitle());
        $writer->endElement();

        $writer->writeElement('link', $item->getLink());

        $writer->startElement('description');
        $writer->writeCdata($item->getDescription());
        $writer->endElement();

        if ($item->getAuthor()) {
            $writer->startElement('author');
            $writer->writeCdata($item->getAuthor());
            $writer->endElement();
        }

        if ($item->getComments()) {
            $writer->writeElement('comments', $item->getComments());
        }

        if ($item->getEnclosure()) {
            $this->writeEnclosure($writer, $item->getEnclosure());
        }

        if ($item->getGuid()) {
            $writer->startElement('guid');
            $writer->writeCdata($item->getGuid());
            $writer->endElement();
        }

        if ($item->getPubDate()) {
            $writer->writeElement('pubDate', $item->getPubDate()->format('r'));
        }

        if ($item->getSource()) {
            $this->writeSource($writer, $item->getSource());
        }

        foreach ($item->getExtensions() as $extension) {
            $rssWriter->writeObject($extension);
        }

        $writer->endElement();
    }

    private function writeEnclosure(\XmlWriter $writer, Enclosure $enclosure)
    {
        $writer->startElement('enclosure');
        $writer->writeAttribute('url', $enclosure->getUrl());
        $writer->writeAttribute('length', $enclosure->getLength());
        $writer->writeAttribute('type', $enclosure->getType());
        $writer->endElement();
    }

    private function writeImage(\XmlWriter $writer, Image $image)
    {
        $writer->startElement('image');
        $writer->writeElement('url', $image->getUrl());
        $writer->writeElement('link', $image->getLink());
        $writer->startElement('title');
        $writer->writeCdata($image->getTitle());
        $writer->endElement();
        $writer->endElement();
    }

    private function writeCloud(\XmlWriter $writer, Cloud $cloud)
    {
        $writer->startElement('cloud');
        $writer->writeAttribute('domain', $cloud->getDomain());
        $writer->writeAttribute('port', $cloud->getPort());
        $writer->writeAttribute('path', $cloud->getPath());
        $writer->writeAttribute('registerProcedure', $cloud->getRegisterProcedure());
        $writer->writeAttribute('protocol', $cloud->getProtocol());
        $writer->endElement();
    }

    private function writeSource(\XmlWriter $writer, Source $source)
    {
        $writer->startElement('source');
        $writer->writeAttribute('url', $source->getUrl());
        $writer->writeCdata($source->getTitle());
        $writer->endElement();
    }

    private function writeCategory(\XmlWriter $writer, Category $category)
    {
        $writer->startElement('category');
        if ($category->getDomain()) {
            $writer->writeAttribute('domain', $category->getDomain());
        }
        $writer->writeCdata($category->getTitle());
        $writer->endElement();
    }
}
