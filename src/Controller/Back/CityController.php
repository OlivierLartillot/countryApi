<?php

namespace App\Controller\Back;

use App\Entity\City;
use App\Entity\Country;
use App\Form\CityType;
use App\Repository\CityRepository;
use App\Repository\DepartmentRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/back/city")
 */
class CityController extends AbstractController
{
    /**
     * @Route("/", name="app_back_city_index", methods={"GET"})
     */
    public function index(CityRepository $cityRepository, DepartmentRepository $departmentRepository): Response
    {

        return $this->render('back/city/index.html.twig', [
            'cities' => $cityRepository->findAll(),
           
        ]);
    }

    /**
     * @Route("/new", name="app_back_city_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CityRepository $cityRepository): Response
    {
        $city = new City();
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cityRepository->add($city, true);

            return $this->redirectToRoute('app_back_city_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/city/new.html.twig', [
            'city' => $city,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/ajax/departments/country/{id}", name="app_back_city_ajax")
     */
    public function ajaxDepartments(Country $country): JsonResponse
    {
        $data = $country->getDepartements();

        try {
            return $this->json(
                    // les données à transformer en JSON
                    $data,
                    // HTTP STATUS CODE
                    200,
                    // HTTP headers supplémentaires, dans notre cas : aucune
                    [],
                    // Contexte de serialisation, les groups de propriété que l'on veux serialise
                    ['groups' => ['show_ajax_departements']]
            );
    
         } catch (Exception $e){ // si une erreur est LANCE, je l'attrape
            // je gère l'erreur
            // par exemple si tu me file un genre ['3000'] qui n existe pas...
             return new JsonResponse("Hoouuu !! Ce qui vient d'arriver est de votre faute : JSON invalide", Response::HTTP_UNPROCESSABLE_ENTITY);
        }



        
    }




    /**
     * @Route("/{id}", name="app_back_city_show", methods={"GET"})
     */
    public function show(City $city): Response
    {
        return $this->render('back/city/show.html.twig', [
            'city' => $city,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_city_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, City $city, CityRepository $cityRepository): Response
    {
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cityRepository->add($city, true);

            return $this->redirectToRoute('app_back_city_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/city/edit.html.twig', [
            'city' => $city,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_city_delete", methods={"POST"})
     */
    public function delete(Request $request, City $city, CityRepository $cityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$city->getId(), $request->request->get('_token'))) {
            $cityRepository->remove($city, true);
        }

        return $this->redirectToRoute('app_back_city_index', [], Response::HTTP_SEE_OTHER);
    }




}
