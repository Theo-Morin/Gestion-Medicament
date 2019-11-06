<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ComposantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        for ($i=1; $i <= 30; $i++) { 
            
            $composant = new Composant;
            
            $nomComposant = $faker->firstName();
            $composant->setNomComposant($nomComposant);

            $manager->persist($composant);

        }
        $manager->flush();
    }
    
}
