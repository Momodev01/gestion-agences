<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Form\AgenceType;
use App\Repository\AgenceRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/agence/form', name: 'agence_form')]
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $agence = new Agence();
        $form = $this->createForm(AgenceType::class, $agence);
        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $agence = $form->getData();
            dd($agence);
            $manager->persist($agence);
            $manager->flush();
            
            return $this->redirectToRoute('app_classe_liste');
        }

        return $this->render('agence/form.html.twig', [
            // 'controller_name' => 'AgenceController',
            'form' => $form->createView(),
        ]);
    }
}
