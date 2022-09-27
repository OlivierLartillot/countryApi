<?php

namespace App\Controller\Front;

use App\Entity\EndpointCategory;
use App\Repository\EndpointCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        return $this->render('front/home/index.html.twig');
    }

    /**
     * @Route("/countries", name="app_countries")
     */
    public function countries(EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        $categoryCountry = $endpointCategoryRepository->findOneBy(['name' => 'Country']);
        $endpointsCountry = $categoryCountry->getEndpoints();

        return $this->render('front/home/countries.html.twig', [
            'endpointsCountry' => $endpointsCountry
        ]);
    }
    
    /**
    * @Route("/departments", name="app_departments")
    */
   public function departments(EndpointCategoryRepository $endpointCategoryRepository): Response
   {
        $categoryDpts = $endpointCategoryRepository->findOneBy(['name' => 'Department']);
        $endpointsDepartment = $categoryDpts->getEndpoints();
        return $this->render('front/home/departments.html.twig', [
            'endpointsDepartment' => $endpointsDepartment
       ]);
   }

    /**
     * @Route("/cities", name="app_cities")
     */
    public function cities(EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        $categoryCity = $endpointCategoryRepository->findOneBy(['name' => 'City']);
        $endpointsCity = $categoryCity->getEndpoints();
        return $this->render('front/home/cities.html.twig', [
            'endpointsCity' => $endpointsCity
       ]);
    }

}
