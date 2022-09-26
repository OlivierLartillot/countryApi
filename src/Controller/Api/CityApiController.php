<?php

namespace App\Controller\Api;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CityApiController extends AbstractController
{
       
    /**
     * @Route("/api/cities", name="app_api_cities_api")
     */
    public function cities_list(CityRepository $countryRepository): JsonResponse
    {
        $cities = $countryRepository->findAll();
        return $this->json(
            $cities,
            200,
            [],
            ['groups' => 'cities',],
            
        );
    }

    /**
     * @Route("/api/cities/details", name="app_api_cities_api_details")
     */
    public function cities_list_details(CityRepository $countryRepository): JsonResponse
    {
        $cities = $countryRepository->findAll();
        return $this->json(
            $cities,
            200,
            [],
            ['groups' => 'cities_details',],
            
        );
    }


    /**
     * @Route("/api/cities/{id}", name="app_api_cities_api_id")
     */
    public function country(City $city): JsonResponse
    {

        return $this->json(
            $city,
            200,
            [],
            ['groups' => 'city'],
            
        );
    }

}

