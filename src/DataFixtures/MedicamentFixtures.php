<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Medicament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MedicamentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create("fr_FR");
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 20 ; $i++) { 
            $medicament= new Medicament();
            $medicament->setLibelle($faker->sentence($nbWords = 10, $variableNbWords = true));
            $medicament->setPrix($faker->sentence($nbWords = 10, $variableNbWords = true));
            $medicament->setContreIndication($faker->sentence($nbWords = 10, $variableNbWords = true));
            $medicament->setEffet($faker->sentence($nbWords = 10, $variableNbWords = true));

            $manager->persist($medicament);
        }
        $manager->flush();
    }
}
