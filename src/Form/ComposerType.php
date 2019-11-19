<?php

namespace App\Form;

use App\Entity\Composer;
use App\Entity\Composant;
use App\Form\ApplicationType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ComposerType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Composant',EntityType::class,['class'=> Composant::class,'choice_label' =>'Choisissez le composant', 'choice_label' =>'NomComposant'],$this->getConfiguration("Composant","Choisissez un composant"))
        ->add('Quantité',IntegerType::class,$this->getConfiguration("Quantité","0"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composer::class,
        ]);
    }
}
