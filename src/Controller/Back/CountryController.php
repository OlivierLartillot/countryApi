<?php

namespace App\Controller\Back;

use App\Entity\Country;
use App\Form\CountryType;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/country")
 */
class CountryController extends AbstractController
{
    /**
     * @Route("/", name="back_country_index", methods={"GET", "POST"})
     */
    public function index(CountryRepository $countryRepository): Response
    {
        return $this->render('back/country/index.html.twig', [
            'countries' => $countryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="back_country_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CountryRepository $countryRepository): Response
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $countryRepository->add($country, true);

            return $this->redirectToRoute('back_country_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/country/new.html.twig', [
            'country' => $country,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_country_show", methods={"GET"})
     */
    public function show(Country $country): Response
    {
        return $this->render('back/country/show.html.twig', [
            'country' => $country,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="back_country_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Country $country, CountryRepository $countryRepository): Response
    {
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $countryRepository->add($country, true);

            return $this->redirectToRoute('back_country_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/country/edit.html.twig', [
            'country' => $country,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_country_delete", methods={"POST"})
     */
    public function delete(Request $request, Country $country, CountryRepository $countryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$country->getId(), $request->request->get('_token'))) {
            $countryRepository->remove($country, true);
        }

        return $this->redirectToRoute('back_country_index', [], Response::HTTP_SEE_OTHER);
    }
}
