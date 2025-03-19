<?php

namespace App\Controller\BO\Monster;

use App\Entity\Monster\SB;
use App\Entity\Monster\SBReaction;
use App\Form\Monster\SBReactionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sb-reaction')]
final class SBReactionController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_sb_reaction_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $sbReaction = new SBReaction();
        $form = $this->createForm(SBReactionType::class, $sbReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbReaction->addMonster($sb);
            $em->persist($sbReaction);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_reaction/new.html.twig', [
            'sb_reaction' => $sbReaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_sb_reaction_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, SBReaction $sbReaction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SBReactionType::class, $sbReaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbReaction->addMonster($sb);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_reaction/edit.html.twig', [
            'sb_reaction' => $sbReaction,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_sb_reaction_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, SBReaction $sbReaction, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$sbReaction->getId(), $request->getPayload()->getString('_token'))) {
            $sbReaction->removeMonster($sb);
            if ($sbReaction->getMonsters()->count() == 0) {
                $em->remove($sbReaction);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
    }
}
