<?php

namespace App\Controller;

use App\Entity\Composant;
use App\Form\ComposantType;
use App\Repository\ComposantRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
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
    public function Add(Request $request,ObjectManager $manager)
    {
        $composant= new Composant();
        $form = $this->createForm(ComposantType::class,$composant);
        $form->handleRequest($request);

      
        
        
        if($form->isSubmitted() && $form->isValid())
        {
      
            $manager->persist($composant);
            $manager->flush();
            $this->addFlash(
                'success',"le composant {$composant->getNomComposant()} a bien été crée"
            );
            return $this->redirectToRoute('compo_show',[
                'id' => $composant->getId()
                
            ]);
        }

        return $this->render('composant/add.html.twig',[
            'form'=> $form->createView()
        ]);
    }

     /**
      * Editer un composant
      *
      * @Route("/compo/{id}/edit", name="compo_edit")
      *
      * @return response
      */
    public function Edit(Composant $composant, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(ComposantType::class,$composant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           
            $manager->persist($composant);
            $manager->flush();
            $this->addFlash(
                'success',"le composant {$composant->getNomComposant()} a bien été modifié"
            );
            return $this->redirectToRoute('compo_show',[
                'id' => $composant->getId()
                
            ]);
        }
        return $this->render('composant/edit.html.twig',[
            'form'=>$form->createView(),
            'composant' => $composant
            ]);
    }

    /**
      * Supprimer un composant
      *
      * @Route("/compo/{id}/delete", name="compo_delete")
      *
      * @return void
      */
      public function Delete()
      {
          return $this->render('composant/delete.html.twig');
      }
}
