<?php

namespace MarcW\RssWriter\Extension\DublinCore;

/**
 * @author Marc Weistroff <marc@weistroff.net> 
 * @see http://www.rssboard.org/rss-profile#namespace-elements-dublin
 */
class DublinCore
{
    private $creator;

    public function setCreator($creator)
    {
        $this->creator = $creator;

        return $this;
    }

    public function getCreator()
    {
        return $this->creator;
    }
}
