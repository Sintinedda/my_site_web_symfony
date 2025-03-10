<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlock;
use App\Entity\StatBlock\StatBlockAction;
use App\Form\StatBlock\StatBlockActionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-action')]
final class StatBlockActionController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_stat_block_action_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $statBlockAction = new StatBlockAction();
        $form = $this->createForm(StatBlockActionType::class, $statBlockAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockAction->setStatBlock($sb);
            $em->persist($statBlockAction);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_action/new.html.twig', [
            'stat_block_action' => $statBlockAction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_stat_block_action_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, StatBlockAction $statBlockAction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(StatBlockActionType::class, $statBlockAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockAction->setStatBlock($sb);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_action/edit.html.twig', [
            'stat_block_action' => $statBlockAction,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_stat_block_action_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, StatBlockAction $statBlockAction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        
        if ($this->isCsrfTokenValid('delete'.$statBlockAction->getId(), $request->getPayload()->getString('_token'))) {
            $statBlockAction->removeStatblock($sb);
            if ($statBlockAction->getStatblock()->count() == 0) {
                $em->remove($statBlockAction);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
    }
}
