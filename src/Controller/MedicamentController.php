<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/medoc", name="medoc_index")
     */
    public function listemedicament(MedicamentRepository $repo)
    {
        //chercher l'ensemble des medicament et on le stock
        $medicament=$repo->findAll();
        return $this->render('medicament/list.html.twig', [
            'medicament' => $medicament //on va le donner dans twig
        ]);
    }

     /**
     * @Route("/medoc/{slug}", name="medoc_show")
     */
    public function showmedicament(MedicamentRepository $repo)
    {
        //chercher l'ensemble des medicament et on le stock
        $medicament=$repo->findAll();
        return $this->render('medicament/show.html.twig', [
            'medicament' => $medicament //on va le donner dans twig
        ]);
    }
    public function ajoutemedicament(Request $request, ObjectManager $manager)
    {
        $Medicament  = new Medicament();
        $form = $this->CreateForm(MedicamentType::class, $Medicament);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($Medicament);
            $manager->flush();
            $this->addFlash(
                "success","L'annonce <strong>{$Medicament->getLibelle()}</strong> a bien été enregistrée !"
            );
            return $this->redirectToRoute('Medicament_show');
        }
        return $this->render('Medicament/addMedicament.html.twig',[
            'form'=> $form->createView()
            ]);
        }
        
     /**
     * @Route("/Medicament/delete/{id}", name="Medicament_delete")
     * @param  Medicament $Medicament
     * @param ObjectManager $manager
     * @return Reponse
     */
    public function deleteMedicament( ObjectManager $manager,Medicament $Medicament)
    {
            $manager->remove($Medicament);
            $manager->flush();
      $this->addFlash(
            'success','Votre Medicament a été supprimé'
        );
        return $this->redirectToRoute('Medicament_show');
  
    }



}
