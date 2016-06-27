<?php

namespace MarcW\RssWriter;

use MarcW\RssWriter\Extension\Core\Channel;

class RssWriter
{
    private $xmlWriter;

    private $writers = [];
    private $namespaces = [];

    private $beganWriting = false;

    public function __construct(\XmlWriter $xmlWriter = null, $writers = [])
    {
        if ($xmlWriter === null) {
            $xmlWriter = new \XmlWriter();
            $xmlWriter->openMemory();
        }

        $this->xmlWriter = $xmlWriter;
        $this->writers = $writers;
    }

    public function registerWriter(WriterRegistererInterface $writer)
    {
        $this->writers = array_merge($this->writers, $writer->getRegisteredWriters());
        $this->namespaces = array_merge($this->namespaces, $writer->getRegisteredNamespaces());
    }

    public function getXmlWriter()
    {
        return $this->xmlWriter;
    }

    public function writeChannel(Channel $channel)
    {
        $this->xmlWriter->startElement('rss');
        foreach ($this->namespaces as $ns => $url) {
            $this->xmlWriter->writeAttribute(sprintf('xmlns:%s', $ns), $url);
        }

        $this->xmlWriter->writeAttribute('version', '2.0');
        $this->writeObject($channel);
        $this->xmlWriter->endElement();

        return $this->xmlWriter->flush();
    }

    public function writeObject($object)
    {
        if (!is_object($object)) {
            throw new \LogicException(sprintf('%s::%s expects an object. %s given.', __CLASS_, __METHOD__, gettype($object)));
        }

        $fqcn = get_class($object);
        if (!isset($this->writers[$fqcn])) {
            throw new \LogicException(sprintf('No writer found for class %s', $fqcn));
        }

        call_user_func($this->writers[$fqcn], $this, $object);
    }
}
