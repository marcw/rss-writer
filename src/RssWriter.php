<?php

namespace MarcW\RssWriter;

use MarcW\RssWriter\Extension\Core\Channel;

/**
 * RssWriter writes RSS feed.
 *
 * @author Marc Weistroff <marc@weistroff.net>
 */
class RssWriter
{
    /**
     * @var \XmlWriter
     */
    private $xmlWriter;

    /**
     * @var array
     */
    private $writers = [];

    /**
     * @var array
     */
    private $namespaces = [];

    /**
     * @var bool
     */
    private $flushEarly = false;

    /**
     * @var bool
     */
    private $xmlIndent;

    /**
     * @var string
     */
    private $xmlIndentString;

    /**
     * @param \XmlWriter $xmlWriter
     * @param array      $writers      An array of instances implementing WriterRegistererInterface
     * @param bool       $indent       Toggle indentation on/off
     * @param string     $indentString Set string used for indenting
     */
    public function __construct(\XmlWriter $xmlWriter = null, array $writers = [], $indent = false, $indentString = ' ')
    {
        if ($xmlWriter === null) {
            $xmlWriter = new \XmlWriter();
            $xmlWriter->openMemory();
        }

        $this->xmlIndent = $indent;
        $this->xmlIndentString = $indentString;

        $this->xmlWriter = $xmlWriter;
        foreach ($writers as $writer) {
            $this->registerWriter($writer);
        }
    }

    /**
     * registerWriter registers a new Writer in the RssWriter instance.
     *
     * @param WriterRegistererInterface $writer
     */
    public function registerWriter(WriterRegistererInterface $writer)
    {
        $this->writers = array_merge($this->writers, $writer->getRegisteredWriters());
        $this->namespaces = array_merge($this->namespaces, $writer->getRegisteredNamespaces());
    }

    /**
     * writeChannel writes a Core\Channel instance feed.
     *
     * @param Channel $channel
     *
     * @return mixed Similar to XMLWriter::flush
     *
     * @see http://php.net/manual/function.xmlwriter-flush.php
     */
    public function writeChannel(Channel $channel)
    {
        $this->xmlWriter->setIndent($this->xmlIndent);
        $this->xmlWriter->setIndentString($this->xmlIndentString);

        $this->xmlWriter->startDocument();
        if ($this->flushEarly) {
            $this->xmlWriter->flush();
        }

        $this->xmlWriter->startElement('rss');
        foreach ($this->namespaces as $ns => $url) {
            $this->xmlWriter->writeAttribute(sprintf('xmlns:%s', $ns), $url);
        }

        $this->xmlWriter->writeAttribute('version', '2.0');
        $this->writeObject($channel);
        $this->xmlWriter->endElement();

        return $this->xmlWriter->flush();
    }

    /**
     * writeObject will write the RSS representation of Object.
     *
     * @param object $object
     *
     * @throws \LogicException if no writer can handle $object or if $object is not an object
     */
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

        if ($this->flushEarly) {
            $this->xmlWriter->flush();
        }
    }

    /**
     * getXmlWriter returns the instance of XmlWriter used.
     *
     * @return \XmlWriter
     */
    public function getXmlWriter()
    {
        return $this->xmlWriter;
    }

    /**
     * If passed true, this instance will flush it's content as soon as
     * possible. Should not be set to true if XMLWriter is used for in-memory
     * writing.
     *
     * @param bool $flushEarly
     */
    public function setFlushEarly($flushEarly)
    {
        $this->flushEarly = $flushEarly;
    }

    /**
     * Returns the current state of flushEarly.
     *
     * @return bool
     */
    public function getFlushEarly()
    {
        return $this->flushEarly;
    }
}
