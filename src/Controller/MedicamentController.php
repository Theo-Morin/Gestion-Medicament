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
     * Liste des Medicaments
     *
     * @Route("/medoc", name="medoc_index")
     * 
     * @return response
     */
    public function List(MedicamentRepository $repo)
    {
        $Medicaments = $repo->findAll();
        return $this->render('Medicament/list.html.twig',[
            'Medicaments' => $Medicaments]);
    }

    /**
     * Ajouter un Medicament
     *
     * @Route("/medoc/add", name="medoc_add")
     * 
     * @return response
     */
    public function Add(Request $request,ObjectManager $manager)
    {
        $Medicament= new Medicament();
        $form = $this->createForm(MedicamentType::class,$Medicament);
        $form->handleRequest($request);

      
        
        
        if($form->isSubmitted() && $form->isValid())
        {
      
            $manager->persist($Medicament);
            $manager->flush();
            $this->addFlash(
                'success',"le Medicament {$Medicament->getNomMedicament()} a bien été crée"
            );
            return $this->redirectToRoute('medoc_index');
        }

        return $this->render('Medicament/add.html.twig',[
            'form'=> $form->createView()
        ]);
    }

     /**
      * Editer un Medicament
      *
      * @Route("/medoc/{id}/edit", name="medoc_edit")
      *
      * @return response
      */
    public function Edit(Medicament $Medicament, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(MedicamentType::class,$Medicament);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           
            $manager->persist($Medicament);
            $manager->flush();
            $this->addFlash(
                'success',"le Medicament {$Medicament->getNomMedicament()} a bien été modifié"
            );
            return $this->redirectToRoute('medoc_index',[
                'id' => $Medicament->getId()
                
            ]);
        }
        return $this->render('Medicament/edit.html.twig',[
            'form'=>$form->createView(),
            'Medicament' => $Medicament
            ]);
    }

    /**
      * Supprimer un Medicament
      *
      * @Route("/medoc/{id}/delete", name="medoc_delete")
      *
      * @return void
      */
      public function Delete(ObjectManager $manager,Medicament $Medicament)
      {
        $manager->remove($Medicament);
        $manager->flush();
        $this->addFlash(
            'success',"le Medicament {$Medicament->getNomMedicament()} a bien été supprimé"
        );

        return $this->redirectToRoute('famille_index');
      }
}
