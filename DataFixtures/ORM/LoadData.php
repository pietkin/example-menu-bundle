<?php

namespace Pietkin\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pietkin\ExampleMenuBundle\Entity\Menu;

class LoadData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file(
            __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'data/menu.xml'
        );
        foreach ($xml->option as $m) {
            $Menu = new Menu();
            $Menu->setTitle($m->title);
            $Menu->setContents($m->contents);
            $manager->persist($Menu);
        }
        $manager->flush();
    }
}
