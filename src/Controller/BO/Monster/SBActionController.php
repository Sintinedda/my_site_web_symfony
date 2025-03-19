<?php

namespace App\Controller\BO\Monster;

use App\Entity\Monster\SB;
use App\Entity\Monster\SBAction;
use App\Form\Monster\SBActionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sb-action')]
final class SBActionController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_sb_action_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $sbAction = new SBAction();
        $form = $this->createForm(SBActionType::class, $sbAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbAction->addMonster($sb);
            $em->persist($sbAction);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_action/new.html.twig', [
            'sbAction' => $sbAction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_sb_action_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, SBAction $sbAction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SBActionType::class, $sbAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbAction->addMonster($sb);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_action/edit.html.twig', [
            'sbAction' => $sbAction,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_sb_action_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, SBAction $sbAction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        
        if ($this->isCsrfTokenValid('delete'.$sbAction->getId(), $request->getPayload()->getString('_token'))) {
            $sbAction->removeMonster($sb);
            if ($sbAction->getMonsters()->count() == 0) {
                $em->remove($sbAction);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
    }
}
