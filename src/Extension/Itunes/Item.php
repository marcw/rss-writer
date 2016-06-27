<?php

namespace MarcW\RssWriter\Extension\Itunes;

/**
 * ItemExtension.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
final class Item extends Common
{
    private $duration;
    private $isClosedCaptionned;
    private $order;

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setIsClosedCaptionned($isClosedCaptionned)
    {
        $this->isClosedCaptionned = $isClosedCaptionned;

        return $this;
    }

    public function getIsClosedCaptionned()
    {
        return $this->isClosedCaptionned;
    }

    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
