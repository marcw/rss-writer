<?php

namespace MarcW\RssWriter\Extension\Core;

/**
 * Guid.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class Guid
{
    private $isPermaLink;
    private $guid;

    public function setIsPermaLink($isPermaLink)
    {
        $this->isPermaLink = $isPermaLink;

        return $this;
    }

    public function getIsPermaLink()
    {
        return $this->isPermaLink;
    }

    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    public function getGuid()
    {
        return $this->guid;
    }
}
