<?php

namespace App\Controller;

use App\Repository\MedicamantRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/medoc", name="medoc_index")
     */
    public function listemedicament()
    {
        //chercher l'ensemble des medicament et on le stock
        return $this->render('medicament/list.html.twig');
    }

     /**
     * @Route("/medoc/{slug}", name="medoc_show")
     */
    public function showmedicament()
    {
        //chercher l'ensemble des medicament et on le stock
        return $this->render('medicament/show.html.twig');
    }

     /**
     * @Route("/medoc/add", name="medoc_add")
     */
    public function ajoutemedicament()
    {
        return $this->render('medicament/add.html.twig');
    }
        
     /**
     * @Route("/medoc/edit/{id}", name="medoc_edit")
     */
    public function editMedicament()
    {
         return $this->render('medicament/edit.html.twig');
    }



}
