<?php

namespace App\DataFixtures;

use App\Entity\Medicamant;
use Faker\Factory;
use App\Entity\Famille;
use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');

     

        for ($i=1; $i <= 30; $i++) { 

        
            
            $firstName = $faker->firstName();
            $prixEchantillon = mt_rand(50,500);
            $ContreIndication = $faker->paragraph(2);
            $nomFamille =$faker->lastName();

            $medicament = new   Medicamant;
                $medicament->setNomCommercial($firstName)
                ->setPrixEchantillon($prixEchantillon)
                ->setContreIndication($ContreIndication)
                ->setContent('<p>'.$faker->paragraph(5).'</p>') 
                ->setPrice(mt_rand(50,500))
                ->setRooms(mt_rand(1,5))
                ->setAuthor($user);

                for ($j=1; $j <= mt_rand(2,5); $j++) { 
                    $image= new Image();
                    $image->setUrl($faker->imageUrl())
                           ->setCaption($faker->sentence())
                           ->setAd($ad);

                    $manager->persist($image);
                }

            $manager->persist($ad);

           
        
        }
        $manager->flush();
    }
}


