<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Form\FamilleType;
use App\Repository\FamilleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilleController extends AbstractController
{
    /**
     * @Route("/famille", name="famille_index")
     */
    public function index(FamilleRepository $repo)
    {
        $familles = $repo->findAll();
        return $this->render('famille/list.html.twig',[
            'familles' => $familles
        ]);
    }

    /**
     * Ajouter une famille
     *
     * @Route("/famille/add", name="famille_add")
     * 
     * @return response
     */
    public function Add(Request $request,ObjectManager $manager)
    {
        $famille= new Famille();
        $form = $this->createForm(FamilleType::class,$famille);
        $form->handleRequest($request);

      
        
        
        if($form->isSubmitted() && $form->isValid())
        {
      
            $manager->persist($famille);
            $manager->flush();
            $this->addFlash(
                'success',"la famille {$famille->getNomFamille()} a bien été crée"
            );
            return $this->redirectToRoute('famille_show',[
                'id' => $famille->getId()
                
            ]);
        }

        return $this->render('famille/add.html.twig',[
            'form'=> $form->createView()
        ]);
    }

     /**
      * Editer une famille
      *
      * @Route("/compo/{id}/edit", name="compo_edit")
      *
      * @return response
      */
    public function Edit(Famille $famille, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(FamilleType::class,$famille);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           
            $manager->persist($famille);
            $manager->flush();
            $this->addFlash(
                'success',"la famille {$famille->getNomFamille()} a bien été modifié"
            );
            return $this->redirectToRoute('compo_show',[
                'id' => $famille->getId()
                
            ]);
        }
        return $this->render('famille/edit.html.twig',[
            'form'=>$form->createView(),
            'famille' => $famille
            ]);
    }

    /**
      * Supprimer une famille
      *
      * @Route("/famille/{id}/delete", name="famille_delete")
      *
      * @return void
      */
      public function Delete()
      {
          return $this->render('famille/delete.html.twig');
      }
}
