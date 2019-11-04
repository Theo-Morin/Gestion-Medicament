<?php

namespace App\Form;

use App\Entity\Medicament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MedicamentType extends AbstractType
{   
     public function getConfiguration($label, $placeholder,$option=[])
    {
        return array_merge(['label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ],$option);

    }  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomCommercial', TextType::class, $this->getConfiguration("Medicament", "Entrez votre Medicament..."))
            ->add('prix', MoneyType::class, $this->getConfiguration("Prix", "Entrez le prix..."))
            ->add('description',TextareaType::class, $this->getConfiguration("Description détaillé", "Présentez l'Medicament de manière détaillé..."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
