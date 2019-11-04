<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComposantController extends AbstractController
{

    /**
     * Liste des composants
     *
     * @Route("/composant/list", name="composant_list")
     * 
     * @return response
     */
    public function List()
    {
        return $this->render('composant/list.html.twig');
    }

    /**
     * Ajouter un composant
     *
     * @Route("/composant/add", name="compo_add")
     * 
     * @return response
     */
    public function Add()
    {
        return $this->render('composant/add.html.twig');
    }

     /**
      * Undocumented function
      *
      * @Route("/composant/edit", name="compo_edit")
      *
      * @return response
      */
    public function Edit()
    {
        return $this->render('composant/edit.html.twig');
    }

    /**
      * Supprimer un composant
      *
      * @Route("/composant/delete", name="compo_delete")
      *
      * @return void
      */
      public function Delete()
      {
          return $this->render('composant/edit.html.twig');
      }
}
