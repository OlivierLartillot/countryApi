<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CountryApiController extends AbstractController
{
    /**
     * @Route("/api/countries", name="app_api_country_api")
     */
    public function countries_list(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/CountryApiController.php',
        ]);
    }
}
