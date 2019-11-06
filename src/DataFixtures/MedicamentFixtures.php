<?php

namespace App\DataFixtures;

use App\Entity\Medicamant;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MedicamentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $var = json_decode(file_get_contents('https://www.data.gouv.fr/storage/f/2013-11-28T11%3A43%3A25.672Z/medicaments.json'));
        $faker = Factory::create('FR-fr');
        foreach ($var as $value) {
            $medicament = new Medicamant;
            $nom = utf8_encode(substr($value->title, 0, 79));
            $medicament->setNomCommercial($nom);
            $medicament->setPrixEchantillon(mt_rand(0.2,50));
            $medicament->setContreIndication($faker->sentence());
            $medicament->setEffet($faker->sentence());

            $manager->persist($medicament);
        }
        $manager->flush();
    }
}
