<?php

namespace App\Controller;

use App\Entity\Talent;
use App\Form\TalentType;
use App\Repository\TalentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/talent')]
final class TalentController extends AbstractController
{
    #[Route(name: 'app_talent_index', methods: ['GET'])]
    public function index(TalentRepository $talentRepository): Response
    {
        return $this->render('talent/index.html.twig', [
            'talent' => $talentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_talent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $talent = new Talent();
        $form = $this->createForm(TalentType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($talent);
            $entityManager->flush();

            return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('talent/new.html.twig', [
            'talent' => $talent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_show', methods: ['GET'])]
    public function show(Talent $talent): Response
    {
        return $this->render('talent/show.html.twig', [
            'talent' => $talent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_talent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Talent $talent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TalentType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('talent/edit.html.twig', [
            'talent' => $talent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_delete', methods: ['POST'])]
    public function delete(Request $request, Talent $talent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$talent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($talent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
    }
}
