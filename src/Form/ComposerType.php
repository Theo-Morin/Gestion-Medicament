<?php

namespace App\Form;

use App\Entity\Composer;
use App\Entity\Composant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ComposerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('composant', EntityType::class, [
            'class' => Composant::class,
            'choice_label' => 'NomComposant'
            ])
            ->add('quantite',TextType::class,[
                'attr' =>[
                    'placeholder' => 'Quantité'
                    ]
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composer::class,
        ]);
    }
}
