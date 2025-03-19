<?php

namespace App\Controller\BO\Spell;

use App\Entity\Spell\Spell;
use App\Entity\Spell\SpellList;
use App\Form\Spell\SpellListType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/spell-list')]
final class SpellListController extends AbstractController
{
    #[Route('/new{slug}', name: 'app_spell_list_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $spell = $em->getRepository(Spell::class)->findOneBy(['slug' => $slug]);
        $spellList = new SpellList();
        $form = $this->createForm(SpellListType::class, $spellList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $spellList->setSpell($spell);
            $em->persist($spellList);
            $em->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/spells/spell_list/new.html.twig', [
            'spell_list' => $spellList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_spell_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpellList $spellList, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpellListType::class, $spellList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/spells/spell_list/edit.html.twig', [
            'spell_list' => $spellList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_spell_list_delete', methods: ['POST'])]
    public function delete(Request $request, SpellList $spellList, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spellList->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($spellList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
    }
}
