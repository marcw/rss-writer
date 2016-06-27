<?php

namespace MarcW\RssWriter\Extension\Core;

/**
 * Enclosure.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class Enclosure
{
    private $url;
    private $length;
    private $type;

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }
}
