<?php

namespace App\Controller;

use App\Repository\ComposantRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComposantController extends AbstractController
{

    /**
     * Liste des composants
     *
     * @Route("/compo", name="compo_index")
     * 
     * @return response
     */
    public function List(ComposantRepository $repo)
    {
        $composants = $repo->findAll();
        return $this->render('composant/list.html.twig',[
            'composants' => $composants]);
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
      * @Route("/compo/{slug}/edit", name="compo_edit")
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
      * @Route("/compo/{slug}/delete", name="compo_delete")
      *
      * @return void
      */
      public function Delete()
      {
          return $this->render('composant/delete.html.twig');
      }
}
