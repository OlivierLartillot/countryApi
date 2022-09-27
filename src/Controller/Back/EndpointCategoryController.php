<?php

namespace App\Controller\Back;

use App\Entity\EndpointCategory;
use App\Form\EndpointCategoryType;
use App\Repository\EndpointCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/endpoint/category")
 */
class EndpointCategoryController extends AbstractController
{
    /**
     * @Route("/", name="app_back_endpoint_category_index", methods={"GET"})
     */
    public function index(EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        return $this->render('back/endpoint_category/index.html.twig', [
            'endpoint_categories' => $endpointCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_endpoint_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        $endpointCategory = new EndpointCategory();
        $form = $this->createForm(EndpointCategoryType::class, $endpointCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $endpointCategoryRepository->add($endpointCategory, true);

            return $this->redirectToRoute('app_back_endpoint_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/endpoint_category/new.html.twig', [
            'endpoint_category' => $endpointCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_endpoint_category_show", methods={"GET"})
     */
    public function show(EndpointCategory $endpointCategory): Response
    {
        return $this->render('back/endpoint_category/show.html.twig', [
            'endpoint_category' => $endpointCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_endpoint_category_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EndpointCategory $endpointCategory, EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        $form = $this->createForm(EndpointCategoryType::class, $endpointCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $endpointCategoryRepository->add($endpointCategory, true);

            return $this->redirectToRoute('app_back_endpoint_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/endpoint_category/edit.html.twig', [
            'endpoint_category' => $endpointCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_endpoint_category_delete", methods={"POST"})
     */
    public function delete(Request $request, EndpointCategory $endpointCategory, EndpointCategoryRepository $endpointCategoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$endpointCategory->getId(), $request->request->get('_token'))) {
            $endpointCategoryRepository->remove($endpointCategory, true);
        }

        return $this->redirectToRoute('app_back_endpoint_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
