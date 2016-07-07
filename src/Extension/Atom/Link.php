<?php

namespace MarcW\RssWriter\Extension\Atom;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Link.
 *
 * @author Marc Weistroff <marc@weistroff.net>
 * @see http://www.rssboard.org/rss-profile#namespace-elements-atom-link
 */
class Link
{
    /**
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $href;

    private $hreflang;

    /**
     * @Assert\GreaterThanOrEqual(0)
     */
    private $length;

    /**
     * @Assert\Choice({"alternate", "enclosure", "related", "self", "via"})
     */
    private $rel;
    private $type;
    private $title;

    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    public function getRel()
    {
        return $this->rel;
    }

    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    public function getHref()
    {
        return $this->href;
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

    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setHreflang($hreflang)
    {
        $this->hreflang = $hreflang;

        return $this;
    }

    public function getHreflang()
    {
        return $this->hreflang;
    }
}
