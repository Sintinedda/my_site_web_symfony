<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlock;
use App\Entity\StatBlock\StatBlockReaction;
use App\Form\StatBlock\StatBlockReactionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-reaction')]
final class StatBlockReactionController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_stat_block_reaction_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $statBlockReaction = new StatBlockReaction();
        $form = $this->createForm(StatBlockReactionType::class, $statBlockReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockReaction->setStatblock($sb);
            $em->persist($statBlockReaction);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_reaction/new.html.twig', [
            'stat_block_reaction' => $statBlockReaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_stat_block_reaction_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, StatBlockReaction $statBlockReaction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(StatBlockReactionType::class, $statBlockReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockReaction->setStatblock($sb);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_reaction/edit.html.twig', [
            'stat_block_reaction' => $statBlockReaction,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_stat_block_reaction_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, StatBlockReaction $statBlockReaction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$statBlockReaction->getId(), $request->getPayload()->getString('_token'))) {
            $statBlockReaction->removeStatblock($sb);
            if ($statBlockReaction->getStatblock()->count() == 0) {
                $em->remove($statBlockReaction);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
    }
}
