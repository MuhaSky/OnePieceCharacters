<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $race = new Race();
        $race->setName('Human');
        $manager->persist($race);

        $race2 = new Race();
        $race2->setName('Fishman');
        $manager->persist($race2);

        $race3 = new Race();
        $race3->setName('Giants');
        $manager->persist($race3);

        $race4 = new Race();
        $race4->setName('Kuja Tribe');
        $manager->persist($race4);

        $manager->flush();

        $this->addReference('races_1', $race);
        $this->addReference('races_2', $race2);
        $this->addReference('races_3', $race3);
        $this->addReference('races_4', $race4);
    }
}
