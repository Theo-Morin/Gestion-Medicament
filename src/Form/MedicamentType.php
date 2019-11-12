<?php

namespace App\Form;

use App\Entity\Medicament;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class MedicamentType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomCommercial',TextType::class,$this->getConfiguration("Nom de commercial","Ecrivez ici le nom commercial ..."))
            ->add('PrixEchantillon',MoneyType::class,$this->getConfiguration("Prix de l'échantillon","Ecrivez ici le prix de l'échantillon ..."))
            ->add('ContreIndication',TextType::class,$this->getConfiguration("Contre indication","Ecrivez ici la contre indication ..."))
            ->add('Effet',TextType::class,$this->getConfiguration("Effet","Ecrivez ici le ou les effets du médicaments ..."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
