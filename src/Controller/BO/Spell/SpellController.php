<?php

namespace App\Controller\BO\Spell;

use App\Entity\Spell\Spell;
use App\Form\Spell\SpellType;
use App\Repository\Spell\SpellRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/spell')]
final class SpellController extends AbstractController
{
    #[Route(name: 'app_spell_index', methods: ['GET'])]
    public function index(SpellRepository $spellRepository): Response
    {
        return $this->render('bo/spells/spell/index.html.twig', [
            'spells' => $spellRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_spell_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $spell = new Spell();
        $form = $this->createForm(SpellType::class, $spell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($spell);
            $entityManager->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('bo/spells/spell/new.html.twig', [
            'spell' => $spell,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_spell_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Spell $spell, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpellType::class, $spell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/spells/spell/edit.html.twig', [
            'spell' => $spell,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_spell_delete', methods: ['POST'])]
    public function delete(Request $request, Spell $spell, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spell->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($spell);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_spell_index', [], Response::HTTP_SEE_OTHER);
    }
}
