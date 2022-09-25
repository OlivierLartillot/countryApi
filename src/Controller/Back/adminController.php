<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class adminController extends AbstractController
{
    /**
     * @Route("/back/", name="app_back_index")
     */
    public function index(): Response
    {



        return $this->render('back/admin/index.html.twig', [
            'controller_name' => 'adminController',
        ]);
    }
}
