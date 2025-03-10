<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlock;
use App\Entity\StatBlock\StatBlockAction;
use App\Entity\StatBlock\StatBlockReaction;
use App\Entity\StatBlock\StatBlockSkill;
use App\Form\StatBlock\StatBlockType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block')]
final class StatBlockController extends AbstractController
{
    #[Route(name: 'app_stat_block_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('bo/sb/stat_block/index.html.twig', [
            'stat_blocks' => $em->getRepository(StatBlock::class)->findAll(),
            'skills' => $em->getRepository(StatBlockSkill::class)->findAll(),
            'actions' => $em->getRepository(StatBlockAction::class)->findAll(),
            'reactions' => $em->getRepository(StatBlockReaction::class)->findAll()
        ]);
    }

    #[Route('/new', name: 'app_stat_block_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statBlock = new StatBlock();
        $form = $this->createForm(StatBlockType::class, $statBlock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statBlock);
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block/new.html.twig', [
            'stat_block' => $statBlock,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stat_block_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatBlock $statBlock, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatBlockType::class, $statBlock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block/edit.html.twig', [
            'stat_block' => $statBlock,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stat_block_delete', methods: ['POST'])]
    public function delete(Request $request, StatBlock $statBlock, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statBlock->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($statBlock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
    }
}
