<?php

namespace App\Controller\bo;

use App\Entity\StatBlockReaction;
use App\Form\StatBlockReactionType;
use App\Repository\StatBlockReactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-reaction')]
final class StatBlockReactionController extends AbstractController
{
    #[Route(name: 'app_stat_block_reaction_index', methods: ['GET'])]
    public function index(StatBlockReactionRepository $statBlockReactionRepository): Response
    {
        return $this->render('bo/stat_block_reaction/index.html.twig', [
            'stat_block_reactions' => $statBlockReactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stat_block_reaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statBlockReaction = new StatBlockReaction();
        $form = $this->createForm(StatBlockReactionType::class, $statBlockReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statBlockReaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_reaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/stat_block_reaction/new.html.twig', [
            'stat_block_reaction' => $statBlockReaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stat_block_reaction_show', methods: ['GET'])]
    public function show(StatBlockReaction $statBlockReaction): Response
    {
        return $this->render('bo/stat_block_reaction/show.html.twig', [
            'stat_block_reaction' => $statBlockReaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stat_block_reaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatBlockReaction $statBlockReaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatBlockReactionType::class, $statBlockReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_reaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/stat_block_reaction/edit.html.twig', [
            'stat_block_reaction' => $statBlockReaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stat_block_reaction_delete', methods: ['POST'])]
    public function delete(Request $request, StatBlockReaction $statBlockReaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statBlockReaction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($statBlockReaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stat_block_reaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
