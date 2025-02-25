<?php

namespace App\Controller\bo;

use App\Entity\SkillTable;
use App\Form\SkillTableType;
use App\Repository\SkillTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/skill-table')]
final class SkillTableController extends AbstractController
{
    #[Route(name: 'app_skill_table_index', methods: ['GET'])]
    public function index(SkillTableRepository $skillTableRepository): Response
    {
        return $this->render('bo/skill_table/index.html.twig', [
            'skill_tables' => $skillTableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_skill_table_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $skillTable = new SkillTable();
        $form = $this->createForm(SkillTableType::class, $skillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($skillTable);
            $entityManager->flush();

            return $this->redirectToRoute('app_skill_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skill_table/new.html.twig', [
            'skill_table' => $skillTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skill_table_show', methods: ['GET'])]
    public function show(SkillTable $skillTable): Response
    {
        return $this->render('bo/skill_table/show.html.twig', [
            'skill_table' => $skillTable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_skill_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SkillTable $skillTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillTableType::class, $skillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_skill_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skill_table/edit.html.twig', [
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

        return $this->redirectToRoute('app_skill_table_index', [], Response::HTTP_SEE_OTHER);
    }
}
