<?php

namespace App\DataFixtures;

use App\DataFixtures\RaceFixtures;
use App\Entity\Characters;
use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CharactersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = new Characters();
        $characters->setName('Monkey D. Luffy');
        $characters->setAge(19);
        $characters->setDescription('Monkey D. Luffy is the captain of the pirate crew named: Straw Hats.');
        $characters->setGender('Male');
        $characters->setGroupSort('Pirate');
        $characters->setImagePath('https://e1.pxfuel.com/desktop-wallpaper/238/852/desktop-wallpaper-masque-luffy-smiling-luffy-smile-thumbnail.jpg');
        // Add data to pivot table
        $characters->setRaces($this->getReference('races_1'));
        $manager->persist($characters);

        $characters2 = new Characters();
        $characters2->setName('Nami');
        $characters2->setAge(20);
        $characters2->setDescription('Nami is the navigator of the Straw Hats crew');
        $characters2->setGender('Female');
        $characters2->setGroupSort('Pirate');
        $characters2->setImagePath('https://media.discordapp.net/attachments/889140810996674600/1153264903042371604/2Q.png');
        $characters2->setRaces($this->getReference('races_1'));
        $manager->persist($characters2);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            RaceFixtures::class,
        ];
    }
}
