<?php

namespace MarcW\RssWriter\Extension\Core;

use Symfony\Component\Validator\Constraints as Assert;

final class Channel
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
    private $items = [];

    /**
     * @Assert\NotBlank
     */
    private $description;

    private $language;
    private $copyright;
    private $managingEditor;
    private $webMaster;
    private $pubDate;
    private $lastBuildDate;
    private $categories = [];
    private $generator;

    /**
     * @Assert\Url
     */
    private $docs;

    private $cloud;

    /**
     * @Assert\GreaterThanOrEqual(0)
     */
    private $ttl;

    private $image;
    private $rating;

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

    public function setExtensions(array $extensions = [])
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function getExtensions()
    {
        return $this->extensions;
    }

    public function addExtension($extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    public function setItems(array $items = [])
    {
        $this->items = $items;

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
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

    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getCopyright()
    {
        return $this->copyright;
    }

    public function setManagingEditor($managingEditor)
    {
        $this->managingEditor = $managingEditor;

        return $this;
    }
    
    public function getManagingEditor()
    {
        return $this->managingEditor;
    }

    public function setWebMaster($webMaster)
    {
        $this->webMaster = $webMaster;

        return $this;
    }
    
    public function getWebMaster()
    {
        return $this->webMaster;
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

    public function setLastBuildDate(\DateTime $lastBuildDate = null)
    {
        $this->lastBuildDate = $lastBuildDate;

        return $this;
    }
    
    public function getLastBuildDate()
    {
        return $this->lastBuildDate;
    }

    public function setCategories(array $categories)
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

    public function setGenerator($generator)
    {
        $this->generator = $generator;

        return $this;
    }

    public function getGenerator()
    {
        return $this->generator;
    }

    public function setDocs($docs)
    {
        $this->docs = $docs;

        return $this;
    }

    public function getDocs()
    {
        return $this->docs;
    }

    public function setCloud(Cloud $cloud = null)
    {
        $this->cloud = $cloud;

        return $this;
    }

    public function getCloud()
    {
        return $this->cloud;
    }

    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

        return $this;
    }

    public function getTtl()
    {
        return $this->ttl;
    }

    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRating()
    {
        return $this->rating;
    }
}
