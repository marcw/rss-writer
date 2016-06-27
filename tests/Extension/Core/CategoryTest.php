<?php

namespace MarcW\RssWriter\Extension\Core;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCategory()
    {
        $category = new Category();
        $category->setDomain('http://do.main')
                  ->setTitle('News')
                  ->setDomain('https://www.example.com');

        $this->assertEquals('News', $category->getTitle());
        $this->assertEquals('https://www.example.com', $category->getDomain());
    }
}
