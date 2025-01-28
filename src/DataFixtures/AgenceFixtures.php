<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $agence = new Agence();
        $agence->setNumero("AG_0");
        $agence->setAdresse("Point E");
        $agence->setTelephone("33 800 10 10");
        $manager->persist($agence);

        $manager->flush();
    }
}
