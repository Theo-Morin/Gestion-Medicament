<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Famille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FamilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        for ($i=1; $i <= 30; $i++) { 
            
            $famille = new Famille;
            
            $Nomfamille = $faker->LastName();
            $famille->setNomFamille($Nomfamille);

            $manager->persist($famille);
        }
        $manager->flush();
}   }
