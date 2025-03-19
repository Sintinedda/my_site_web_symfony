<?php

namespace App\Controller\BO\Monster;

use App\Entity\Monster\SB;
use App\Entity\Monster\SBAction;
use App\Entity\Monster\SBReaction;
use App\Entity\Monster\SBSkill;
use App\Form\Monster\SBType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sb')]
final class SBController extends AbstractController
{
    #[Route(name: 'app_sb', methods: 'GET')]
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('bo/sb/sb/index.html.twig', [
            'sbs' => $em->getRepository(SB::class)->findAll(),
            'skills' => $em->getRepository(SBSkill::class)->findAll(),
            'actions' => $em->getRepository(SBAction::class)->findAll(),
            'reactions' => $em->getRepository(SBReaction::class)->findAll()
        ]);
    }

    #[Route('/new', name: 'app_sb_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $sb = new SB();
        $form = $this->createForm(SBType::class, $sb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($sb);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb/new.html.twig', [
            'sb' => $sb,
            'form' => $form
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SB $sb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SBType::class, $sb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb/edit.html.twig', [
            'sb' => $sb,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sb_delete', methods: ['POST'])]
    public function delete(Request $request, SB $sb, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sb->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($sb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
    }
}