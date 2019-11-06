<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComposantController extends AbstractController
{

    /**
     * Liste des composants
     *
     * @Route("/compo", name="compo_index")
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
     * @Route("/compo/add", name="compo_add")
     * 
     * @return response
     */
    public function Add()
    {
        return $this->render('composant/add.html.twig');
    }

     /**
      * Editer un composant
      *
      * @Route("/compo/edit", name="compo_edit")
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
      * @Route("/compo/delete", name="compo_delete")
      *
      * @return void
      */
      public function Delete()
      {
          return $this->render('composant/delete.html.twig');
      }
}
