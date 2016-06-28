<?php

namespace MarcW\RssWriter\Extension\Core;

use Symfony\Component\Validator\Constraints as Assert;

final class Item
{
    /**
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $link;

    private $extensions = [];

    /**
     * @Assert\NotBlank
     */
    private $description;

    private $author;
    private $categories = [];

    /**
     * @Assert\Url
     */
    private $comments;
    private $enclosure;
    private $guid;
    private $pubDate;
    private $source;

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

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
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

    public function setEnclosure(Enclosure $enclosure = null)
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    public function getEnclosure()
    {
        return $this->enclosure;
    }

    public function setGuid(Guid $guid = null)
    {
        $this->guid = $guid;

        return $this;
    }

    public function getGuid()
    {
        return $this->guid;
    }

    public function setPubDate(\DateTime $pubDate = null)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    public function getPubDate()
    {
        return $this->pubDate;
    }

    public function setSource(Source $source = null)
    {
        $this->source = $source;

        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setCategories(array $categories = [])
    {
        $this->categories = $categories;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function addCategory($category)
    {
        $this->categories[] = $category;

        return $this;
    }

    public function addExtension($extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function getExtensions()
    {
        return $this->extensions;
    }
}
