<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @Route("/famille", name="famille_index")
     */
    public function index()
    {
        return $this->render('famille/index.html.twig');
    }

     /**
     * @Route("/famille/add", name="famille_add")
     */
    public function add()
    {
        return $this->render('famille/add.html.twig');
    }

    /**
     * @Route("/famille/{slug}", name="famille_show")
     */
    public function show()
    {
        return $this->render('famille/show.html.twig');
    }

     /**
     * @Route("/famille/{slug}/edit", name="famille_edit")
     */
    public function edit()
    {
        return $this->render('famille/edit.html.twig');
    }
}
