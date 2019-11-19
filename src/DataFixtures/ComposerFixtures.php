<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Composer;
use App\Entity\Medicament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ComposerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $var = json_decode(file_get_contents('https://www.data.gouv.fr/storage/f/2013-11-28T11%3A43%3A25.672Z/medicaments.json'));
        $faker = Factory::create('FR-fr');
        foreach ($var as $value) {
            $Composer = new Composer();
            $Composer->setComposant($Composant->sentence());
            $composer->setMedicament($Medicament->sentence());
            $composer->setquantite($quantite->sentence());
            ;
        }
        $manager->flush();
    }
}


