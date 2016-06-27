<?php

namespace MarcW\RssWriter;

interface WriterRegistererInterface
{
    /**
     * @return array
     */
    public function getRegisteredWriters();

    /**
     * @return array
     */
    public function getRegisteredNamespaces();
}
