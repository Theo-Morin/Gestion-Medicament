<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName',TextType::class,$this->getConfiguration("Prénom","Votre prénom .."))
            ->add('LastName',TextType::class,$this->getConfiguration("Prénom","Votre prénom .."))
            ->add('Email',EmailType::class,$this->getConfiguration("Prénom","Votre prénom .."))
            ->add('hash',PasswordType::class,$this->getConfiguration("Mot de pass","Votre mot de pass"))
            ->add('passwordConfirm',PasswordType::class,$this->getConfiguration("Confirmation de mot de pass","Veuillez saisir votre mot de pass"))
            ->add('Picture',UrlType::class,$this->getConfiguration("Mot de pass","Votre mot de pass"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
