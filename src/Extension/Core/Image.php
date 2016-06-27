<?php

namespace MarcW\RssWriter\Extension\Core;

use Symfony\Component\Validator\Constraints as Assert;

class Image
{
    /**
     * @Assert\NotBlank
     */
    private $url;

    /**
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $link;

    /**
     * @Assert\LessThanOrEqual(144)
     * @Assert\GreaterThan(0)
     */
    private $width;

    /**
     * @Assert\LessThanOrEqual(400)
     * @Assert\GreaterThan(0)
     */
    private $height;

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
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

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }
}
