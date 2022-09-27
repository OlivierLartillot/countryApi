<?php

namespace App\Controller\Back;

use App\Entity\Endpoint;
use App\Form\EndpointType;
use App\Repository\EndpointRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/endpoint")
 */
class EndpointController extends AbstractController
{
    /**
     * @Route("/", name="app_back_endpoint_index", methods={"GET"})
     */
    public function index(EndpointRepository $endpointRepository): Response
    {
        return $this->render('back/endpoint/index.html.twig', [
            'endpoints' => $endpointRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_endpoint_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EndpointRepository $endpointRepository): Response
    {
        $endpoint = new Endpoint();
        $form = $this->createForm(EndpointType::class, $endpoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $endpointRepository->add($endpoint, true);

            return $this->redirectToRoute('app_back_endpoint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/endpoint/new.html.twig', [
            'endpoint' => $endpoint,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_endpoint_show", methods={"GET"})
     */
    public function show(Endpoint $endpoint): Response
    {
        return $this->render('back/endpoint/show.html.twig', [
            'endpoint' => $endpoint,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_endpoint_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Endpoint $endpoint, EndpointRepository $endpointRepository): Response
    {
        $form = $this->createForm(EndpointType::class, $endpoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $endpointRepository->add($endpoint, true);

            return $this->redirectToRoute('app_back_endpoint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/endpoint/edit.html.twig', [
            'endpoint' => $endpoint,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_endpoint_delete", methods={"POST"})
     */
    public function delete(Request $request, Endpoint $endpoint, EndpointRepository $endpointRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$endpoint->getId(), $request->request->get('_token'))) {
            $endpointRepository->remove($endpoint, true);
        }

        return $this->redirectToRoute('app_back_endpoint_index', [], Response::HTTP_SEE_OTHER);
    }
}
