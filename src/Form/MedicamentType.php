<?php

namespace App\Form;

use App\Entity\Famille;
use App\Entity\Medicament;
use App\Form\ApplicationType;
use App\Repository\FamilleRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MedicamentType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('NomCommercial',TextType::class,$this->getConfiguration("Nom commercial","Ecrivez ici le nom commercial ..."))
            ->add('PrixEchantillon',MoneyType::class,$this->getConfiguration("Prix de l'échantillon","Ecrivez ici le prix de l'échantillon ..."))
            ->add('ContreIndication',TextType::class,$this->getConfiguration("Contre indication","Ecrivez ici la contre indication ..."))
            ->add('Effet',TextType::class,$this->getConfiguration("Effet","Ecrivez ici le ou les effets du médicament ..."))
            ->add('famille',EntityType::class,['class'=> Famille::class,'choice_label' =>'Choisissez la famille...', 'choice_label' =>'NomFamille'],$this->getConfiguration("Famille","Choisissez une famille..."))
            ->add('lesComposers',CollectionType::class,
            [
                'entry_type' => ComposerType::class,
                'allow_add' => true,
                'allow_delete' => true
            ]);   
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
