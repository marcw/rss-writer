<?php

namespace MarcW\RssWriter\Extension\Itunes;

/**
 * @see https://help.apple.com/itc/podcasts_connect/#/itcb54353390
 */
abstract class Common
{
    private $author;
    private $block;
    private $image;
    private $explicit;
    private $subtitle;

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    public function getBlock()
    {
        return $this->block;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setExplicit($explicit)
    {
        $this->explicit = $explicit;

        return $this;
    }

    public function getExplicit()
    {
        return $this->explicit;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }
}
