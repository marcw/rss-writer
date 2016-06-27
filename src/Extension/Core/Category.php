<?php

namespace MarcW\RssWriter\Extension\Core;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
final class Category
{
    /**
     * @Assert\Url
     */
    private $domain;

    /**
     * @Assert\NotBlank
     */
    private $title;

    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDomain()
    {
        return $this->domain;
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
