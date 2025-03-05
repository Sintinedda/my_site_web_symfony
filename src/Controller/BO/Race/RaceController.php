<?php

namespace App\Controller\BO\Race;

use App\Entity\Race\Race;
use App\Form\Race\RaceType;
use App\Repository\Race\RaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/race')]
final class RaceController extends AbstractController
{
    #[Route(name: 'app_race_index', methods: ['GET'])]
    public function index(RaceRepository $raceRepository): Response
    {
        return $this->render('bo/races/race/index.html.twig', [
            'races' => $raceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_race_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $race = new Race();
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($race);
            $entityManager->flush();

            return $this->redirectToRoute('app_race_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/races/race/new.html.twig', [
            'race' => $race,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_race_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Race $race, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_race_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/races/race/edit.html.twig', [
            'race' => $race,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_race_delete', methods: ['POST'])]
    public function delete(Request $request, Race $race, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$race->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($race);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_race_index', [], Response::HTTP_SEE_OTHER);
    }
}
