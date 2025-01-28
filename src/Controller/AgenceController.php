<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AgenceController extends AbstractController
{
    #[Route('/agence/index', name: 'agence_index')]
    public function index(): Response
    {
        return $this->render('agence/index.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }
    
    #[Route('/agence/show', name: 'agence_show', methods:['GET'])]
    public function show(AgenceRepository $agenceRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $agences = $agenceRepository->findAll();
        $agencies = $paginator->paginate(
            $agences,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('agence/show.html.twig', [
            // 'controller_name' => 'AgenceController',
            'agences' => $agencies,
        ]);
    }
}
