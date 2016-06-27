<?php

namespace MarcW\RssWriter\Extension\Slash;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see http://web.resource.org/rss/1.0/modules/slash/
 */
class Slash
{
    private $section;
    private $department;
    private $hitParade;

    /**
     * @Assert\GreaterThanOrEqual(0)
     */
    private $comments;

    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    public function getSection()
    {
        return $this->section;
    }

    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setHitParade($hitParade)
    {
        $this->hitParade = $hitParade;

        return $this;
    }

    public function getHitParade()
    {
        return $this->hitParade;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    public function getComments()
    {
        return $this->comments;
    }
}
