<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/medicament", name="medicament_liste")
     */
    public function listemedicament(ArticleRepository $repo)
    {
        //chercher l'ensemble des medicament et on le stock
        $medicament=$repo->findAll();
        return $this->render('medicament/list.html.twig', [
            'medicament' => $medicament //on va le donner dans twig
        ]);
    }
    /**
     * @Route("/medicament", name="medicament_liste")
     */
    public function showmedicament(MedicamentRepository $repo)
    {
        //chercher l'ensemble des medicament et on le stock
        $medicament=$repo->findAll();
        return $this->render('medicament/show.html.twig', [
            'medicament' => $medicament //on va le donner dans twig
        ]);
    }
}
