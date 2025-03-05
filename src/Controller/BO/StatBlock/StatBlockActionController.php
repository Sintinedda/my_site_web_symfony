<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlockAction;
use App\Form\StatBlock\StatBlockActionType;
use App\Repository\StatBlock\StatBlockActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-action')]
final class StatBlockActionController extends AbstractController
{
    #[Route(name: 'app_stat_block_action_index', methods: ['GET'])]
    public function index(StatBlockActionRepository $statBlockActionRepository): Response
    {
        return $this->render('bo/sb/stat_block_action/index.html.twig', [
            'stat_block_actions' => $statBlockActionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stat_block_action_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statBlockAction = new StatBlockAction();
        $form = $this->createForm(StatBlockActionType::class, $statBlockAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statBlockAction);
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_action_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_action/new.html.twig', [
            'stat_block_action' => $statBlockAction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stat_block_action_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatBlockAction $statBlockAction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatBlockActionType::class, $statBlockAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_action_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_action/edit.html.twig', [
            'stat_block_action' => $statBlockAction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stat_block_action_delete', methods: ['POST'])]
    public function delete(Request $request, StatBlockAction $statBlockAction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statBlockAction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($statBlockAction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stat_block_action_index', [], Response::HTTP_SEE_OTHER);
    }
}
