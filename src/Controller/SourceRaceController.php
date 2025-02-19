<?php

namespace App\Controller;

use App\Entity\SourceRace;
use App\Form\SourceRaceType;
use App\Repository\SourceRaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/race-source')]
final class SourceRaceController extends AbstractController
{
    #[Route(name: 'app_source_race_index', methods: ['GET'])]
    public function index(SourceRaceRepository $sourceRaceRepository): Response
    {
        return $this->render('source_race/index.html.twig', [
            'source_races' => $sourceRaceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_source_race_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sourceRace = new SourceRace();
        $form = $this->createForm(SourceRaceType::class, $sourceRace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sourceRace);
            $entityManager->flush();

            return $this->redirectToRoute('app_source_race_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('source_race/new.html.twig', [
            'source_race' => $sourceRace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_source_race_show', methods: ['GET'])]
    public function show(SourceRace $sourceRace): Response
    {
        return $this->render('source_race/show.html.twig', [
            'source_race' => $sourceRace,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_source_race_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SourceRace $sourceRace, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SourceRaceType::class, $sourceRace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_source_race_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('source_race/edit.html.twig', [
            'source_race' => $sourceRace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_source_race_delete', methods: ['POST'])]
    public function delete(Request $request, SourceRace $sourceRace, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sourceRace->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($sourceRace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_source_race_index', [], Response::HTTP_SEE_OTHER);
    }
}
