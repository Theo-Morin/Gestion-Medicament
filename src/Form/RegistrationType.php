<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname',TextType::class,$this->getConfiguration("Prénom","Votre prénom .."))
        ->add('lastname',TextType::class,$this->getConfiguration("Nom","Votre nom .."))
        ->add('email',EmailType::class,$this->getConfiguration("Email","Votre email .."))
        ->add('picture',UrlType::class,$this->getConfiguration("Photo","Votre photo de profil.."))
        ->add('hash',PasswordType::class,$this->getConfiguration("Mot de pass","Votre mot de pass"))
        ->add('passwordConfirm',PasswordType::class,$this->getConfiguration("Confirmation de mot de pass","Veuillez saisir votre mot de pass"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
