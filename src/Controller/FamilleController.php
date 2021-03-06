<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Form\FamilleType;
use App\Repository\FamilleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilleController extends AbstractController
{
    /**
     * Permet d'afficher la liste des familles
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
     * @IsGranted("ROLE_USER")
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
            return $this->redirectToRoute('famille_index',[
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
      * @Route("/famille/{id}/edit", name="famille_edit")
      * @IsGranted("ROLE_USER")
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
            return $this->redirectToRoute('famille_show',[
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
      * @IsGranted("ROLE_USER")
      * @return void
      */
      public function Delete(ObjectManager $manager,Famille $famille)
      {
        $manager->remove($famille);
        $manager->flush();
        $this->addFlash(
            'success',"la famille {$famille->getNomfamille()} a bien été supprimé"
        );

        return $this->redirectToRoute('famille_index');
      }

      /**
     * Permet d'afficher une seule famille
     *
     * @Route("/famille/{id}", name="famille_show")
     * 
     * @return Response
     */
    public function show(Famille $famille){
        return $this->render('famille/show.html.twig',[
        'famille' => $famille]);
    }
}
