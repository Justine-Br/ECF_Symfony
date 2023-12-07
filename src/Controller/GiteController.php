<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Model\SearchData;
use App\Form\SearchType;
use App\Entity\Proprietaire;
use App\Repository\GiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Composant\Formulaire\FormView;

#[Route('/gite', name: 'app_gite_')]
class GiteController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(GiteRepository $giteRepository, Request $request): Response
    {
        $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData, [
            'method' => 'GET',
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $gites = $giteRepository->findBySearch($searchData);

            return $this->render('gite/index.html.twig', [
                'form' => $form,
                'gites' => $gites
            ]);
        }

        return $this->render('gite/index.html.twig', [
            'form' => $form->createView(),
            'gites' => $giteRepository->findAll()
        ]);
    }

    #[Route('/details/{id}', name: 'app_details')]
    public function details(Gite $gite): Response
    {
        return $this->render('gite/details.html.twig', [
            'gite' => $gite
        ]);
    }
}
