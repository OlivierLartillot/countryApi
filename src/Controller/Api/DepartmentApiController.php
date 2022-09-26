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
        $departments = $departmentRepository->findAll();
        return $this->json(
            $departments,
            200,
            [],
            ['groups' => 'departments',],
            
        );
    }

    /**
     * @Route("/api/departments/{id}", requirements={"id" = "(\d+)"}, name="app_api_departments_api_id")
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

    /**
     * @Route("/api/departments/details", name="app_api_departments_api_details")
     */
    public function departments_list_details(DepartmentRepository $departmentRepository): JsonResponse
    {
        $departments = $departmentRepository->findAll();
        return $this->json(
            $departments,
            200,
            [],
            ['groups' => 'departments_details',],
            
        );
    }


}
