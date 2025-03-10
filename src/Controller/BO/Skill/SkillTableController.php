<?php

namespace App\Controller\BO\Skill;

use App\Entity\Skill\Skill;
use App\Entity\Skill\SkillTable;
use App\Form\Skill\SkillTableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/skill-table')]
final class SkillTableController extends AbstractController
{
    #[Route('/new/{id2}', name: 'app_skill_table_new', methods: ['GET', 'POST'])]
    public function new(int $id2, Request $request, EntityManagerInterface $em): Response
    {
        $skill = $em->getRepository(Skill::class)->findOneBy(['id' => $id2]);
        $skillTable = new SkillTable();
        $form = $this->createForm(SkillTableType::class, $skillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $skillTable->setSkill($skill);
            $em->persist($skillTable);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/skill_table/new.html.twig', [
            'skill_table' => $skillTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/', name: 'app_skill_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SkillTable $skillTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillTableType::class, $skillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/skill_table/edit.html.twig', [
            'skill_table' => $skillTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skill_table_delete', methods: ['POST'])]
    public function delete(Request $request, SkillTable $skillTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skillTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($skillTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
