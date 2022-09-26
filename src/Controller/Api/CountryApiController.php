<?php

namespace App\Controller\Api;

use App\Entity\Country;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CountryApiController extends AbstractController
{
       
    /**
     * @Route("/api/countries", name="app_api_countries_api")
     */
    public function countries_list(CountryRepository $countryRepository): JsonResponse
    {
        $countries = $countryRepository->findAll();
        return $this->json(
            $countries,
            200,
            [],
            ['groups' => 'countries',],
            
        );
    }

    /**
     * @Route("/api/countries/{id}", requirements={"id" = "(\d+)"}, name="app_api_countries_api_id")
     */
    public function country(Country $country): JsonResponse
    {

        return $this->json(
            $country,
            200,
            [],
            ['groups' => 'country'],
            
        );
    }

    /**
     * @Route("/api/countries/details", name="app_api_countries_api_details")
     */
    public function countries_list_details(CountryRepository $countryRepository): JsonResponse
    {
        $countries = $countryRepository->findAll();
        return $this->json(
            $countries,
            200,
            [],
            ['groups' => 'countries_details',],
            
        );
    }

}
