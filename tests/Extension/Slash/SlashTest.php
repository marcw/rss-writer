<?php

namespace MarcW\RssWriter\Extension\Slash;

class SlashTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $slash = new Slash();
        $slash->setSection('Articles')
              ->setDepartment('Foobar')
              ->setHitParade('123,124,125')
              ->setComments(432)
              ->setDepartment('News')   // in order to test fluent interface
        ;

        $this->assertSame('Articles', $slash->getSection());
        $this->assertSame('News', $slash->getDepartment());
        $this->assertSame('123,124,125', $slash->getHitParade());
        $this->assertSame(432, $slash->getComments());
    }
}
