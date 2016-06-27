<?php

namespace MarcW\RssWriter\Extension\Core;

use Symfony\Component\Validator\Constraints as Assert;

final class Source
{
    /**
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $url;

    /**
     * @Assert\NotBlank
     */
    private $title;

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
}
