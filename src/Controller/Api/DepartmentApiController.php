<?php

namespace App\Controller\Api;

use App\Entity\Department;
use App\Repository\DepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class DepartmentApiController extends AbstractController
{


       
    /**
     * @Route("/api/departments", name="app_api_departments_api")
     */
    public function departments_list(DepartmentRepository $departmentRepository): JsonResponse
    {
        $countries = $departmentRepository->findAll();
        return $this->json(
            $countries,
            200,
            [],
            ['groups' => 'departments',],
            
        );
    }

    /**
     * @Route("/api/departments/{id}", name="app_api_departments_api_id")
     */
    public function department(Department $dpt): JsonResponse
    {

        return $this->json(
            $dpt,
            200,
            [],
            ['groups' => 'department',],
            
        );
    }


}
