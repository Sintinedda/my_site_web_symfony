<?php

namespace App\Controller\BO\Skill;

use App\Entity\Skill\Incantation;
use App\Form\Skill\IncantationType;
use App\Repository\Skill\IncantationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/incantation')]
final class IncantationController extends AbstractController
{
    #[Route(name: 'app_incantation_index', methods: ['GET'])]
    public function index(IncantationRepository $incantationRepository): Response
    {
        return $this->render('bo/skills/incantation/index.html.twig', [
            'incantations' => $incantationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_incantation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $incantation = new Incantation();
        $form = $this->createForm(IncantationType::class, $incantation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($incantation);
            $entityManager->flush();

            return $this->redirectToRoute('app_incantation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/incantation/new.html.twig', [
            'incantation' => $incantation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_incantation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Incantation $incantation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IncantationType::class, $incantation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_incantation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/incantation/edit.html.twig', [
            'incantation' => $incantation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_incantation_delete', methods: ['POST'])]
    public function delete(Request $request, Incantation $incantation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incantation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($incantation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_incantation_index', [], Response::HTTP_SEE_OTHER);
    }
}
