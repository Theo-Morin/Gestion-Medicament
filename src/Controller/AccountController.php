<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AccountType;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/login", name="account_login")
     */
    public function login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        return $this->render('user/login.html.twig',
        ['has_error' => $error !== null ]);
    }

    /**
     * Permet de se deconnecter
     * 
     * @Route("/logout", name="account_logout")
     * 
     * @return void
     */
    public function logout()
    {
        
    }

    /**
     * Permet de se registrer
     * 
     * @Route("/register", name="account_register")
     * 
     * @return response
     */
    public function register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class , $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user,$user->getHash());
            $user->setHash($hash);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre compte a bien était crée'
            );
            return $this->redirectToRoute("account_login");
        }
        return $this->render('user/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * Changer le mdp
     * 
     * @Route("/account/update-password", name="account_password")
     * 
     * @return response
     */
    public function updatePassword()
    {
        return $this->render('account/password.html.twig');
    }

    /* Permet d'afficher le profil d'un utilisateur 
     * 
     * @Route("/profile/{id}", name="account_profile")
     * 
     * @return Response
     */
    public function profile(User $user)
    {
        $user= $this->getUser();
        return $this->render('user/profile.html.twig',[
            'user'=> $user
        ]);
    }

}

