<?php

namespace App\Controller\BO\Monster;

use App\Entity\Monster\ActionPartMonster;
use App\Entity\Monster\SB;
use App\Entity\Monster\SBAction;
use App\Form\Monster\ActionPartMonsterType;
use App\Form\Monster\SBActionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sb-action-part')]
final class ActionPartMonsterController extends AbstractController
{
    #[Route('/new/{slug}/{id}', name: 'app_sb_action_part_new', methods: ['GET', 'POST'])]
    public function new(string $slug, int $id, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $action = $em->getRepository(SBAction::class)->findOneBy(['id' => $id]);
        $spe = new ActionPartMonster();
        $form = $this->createForm(ActionPartMonsterType::class, $spe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $spe->setMonster($sb);
            $spe->setAction($action);
            $em->persist($spe);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_action_part/new.html.twig', [
            'spe' => $spe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sb_action_part_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActionPartMonster $spe, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ActionPartMonsterType::class, $spe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_action_part/edit.html.twig', [
            'spe' => $spe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sb_action_part_delete', methods: ['POST'])]
    public function delete(Request $request, ActionPartMonster $spe, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spe->getId(), $request->getPayload()->getString('_token'))) {
            $em->remove($spe);
            $em->flush();
        }

        return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
    }
}