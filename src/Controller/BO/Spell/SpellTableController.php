<?php

namespace App\Controller\BO\Spell;

use App\Entity\Spell\Spell;
use App\Entity\Spell\SpellTable;
use App\Form\Spell\SpellTableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/spell-table')]
final class SpellTableController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_spell_table_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $spellTable = new SpellTable();
        $spell = $em->getRepository(Spell::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SpellTableType::class, $spellTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $spellTable->setSpell($spell);
            $em->persist($spellTable);
            $em->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/spells/spell_table/new.html.twig', [
            'spell_table' => $spellTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_spell_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpellTable $spellTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpellTableType::class, $spellTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/spells/spell_table/edit.html.twig', [
            'spell_table' => $spellTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_spell_table_delete', methods: ['POST'])]
    public function delete(Request $request, SpellTable $spellTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spellTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($spellTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
    }
}
