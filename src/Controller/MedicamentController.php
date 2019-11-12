<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Form\MedicamentType;
use App\Repository\MedicamentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedicamentController extends AbstractController
{

    /**
     * Liste des medicaments
     *
     * @Route("/medoc", name="medoc_index")
     * 
     * @return response
     */
    public function List(MedicamentRepository $repo)
    {
        $medicaments = $repo->findAll();
        return $this->render('medicament/list.html.twig',[
            'medicaments' => $medicaments]);
    }

    /**
     * Ajouter un medicament
     *
     * @Route("/medoc/add", name="medoc_add")
     * 
     * @return response
     */
    public function Add(Request $request,ObjectManager $manager)
    {
        $medicament= new medicament();
        $form = $this->createForm(MedicamentType::class,$medicament);
        $form->handleRequest($request);

      
        
        
        if($form->isSubmitted() && $form->isValid())
        {
      
            $manager->persist($medicament);
            $manager->flush();
            $this->addFlash(
                'success',"Le médicament {$medicament->getNomCommercial()} a bien été créé"
            );
            return $this->redirectToRoute('medoc_show',[
                'id' => $medicament->getId(),
                'famille' => $medicament->getFamille()
            ]);
        }

        return $this->render('medicament/add.html.twig',[
            'form'=> $form->createView()
        ]);
    }

     /**
      * Editer un medicament
      *
      * @Route("/medoc/{id}/edit", name="medoc_edit")
      *
      * @return response
      */
    public function Edit(Medicament $medicament, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(MedicamentType::class,$medicament);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           
            $manager->persist($medicament);
            $manager->flush();
            $this->addFlash(
                'success',"Le médicament {$medicament->getNomCommercial()} a bien été modifié"
            );
            return $this->redirectToRoute('medoc_show',[
                'id' => $medicament->getId(),
                'famille' => $medicament->getFamille()
            ]);
        }
        return $this->render('medicament/edit.html.twig',[
            'form'=>$form->createView(),
            'medicament' => $medicament
            ]);
    }

    /**
      * Supprimer un medicament
      *
      * @Route("/medoc/{id}/delete", name="medoc_delete")
      *
      * @return void
      */
      public function Delete(ObjectManager $manager,Medicament $medicament)
      {
        $manager->remove($medicament);
        $manager->flush();
        $this->addFlash(
            'success',"Le médicament {$medicament->getNomCommercial()} a bien été supprimé"
        );

        return $this->redirectToRoute('medoc_index');
      }

    /**
     * Permet d'afficher un médicament
     *
     * @Route("/medoc/{id}", name="medoc_show")
     * 
     * @return Response
     */
    public function show(Medicament $medicament){
        return $this->render('medicament/show.html.twig',[
        'medicament' => $medicament]);
    }
}
