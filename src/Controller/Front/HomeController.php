<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('front/home/index.html.twig');
    }

    /**
     * @Route("/countries", name="app_countries")
     */
    public function countries(): Response
    {

        return $this->render('front/home/countries.html.twig');
    }
    
    /**
    * @Route("/departments", name="app_departments")
    */
   public function departments(): Response
   {
       return $this->render('front/home/departments.html.twig');
   }

    /**
     * @Route("/cities", name="app_cities")
     */
    public function cities(): Response
    {
        return $this->render('front/home/cities.html.twig');
    }

}
