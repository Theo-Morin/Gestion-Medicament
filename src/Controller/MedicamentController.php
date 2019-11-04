<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/medoc_index", name="medoc_index")
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
     * @Route("/medoc_show", name="medoc_show")
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
