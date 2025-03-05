<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlockSkill;
use App\Form\StatBlock\StatBlockSkillType;
use App\Repository\StatBlock\StatBlockSkillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-skill')]
final class StatBlockSkillController extends AbstractController
{
    #[Route(name: 'app_stat_block_skill_index', methods: ['GET'])]
    public function index(StatBlockSkillRepository $statBlockSkillRepository): Response
    {
        return $this->render('bo/sb/stat_block_skill/index.html.twig', [
            'stat_block_skills' => $statBlockSkillRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stat_block_skill_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statBlockSkill = new StatBlockSkill();
        $form = $this->createForm(StatBlockSkillType::class, $statBlockSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statBlockSkill);
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_skill/new.html.twig', [
            'stat_block_skill' => $statBlockSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stat_block_skill_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatBlockSkill $statBlockSkill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatBlockSkillType::class, $statBlockSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stat_block_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_skill/edit.html.twig', [
            'stat_block_skill' => $statBlockSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stat_block_skill_delete', methods: ['POST'])]
    public function delete(Request $request, StatBlockSkill $statBlockSkill, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statBlockSkill->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($statBlockSkill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stat_block_skill_index', [], Response::HTTP_SEE_OTHER);
    }
}
