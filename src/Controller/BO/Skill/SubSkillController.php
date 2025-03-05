<?php

namespace App\Controller\BO\Skill;

use App\Entity\Skill\SubSkill;
use App\Form\Skill\SubSkillType;
use App\Repository\Skill\SubSkillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sub-skill')]
final class SubSkillController extends AbstractController
{
    #[Route(name: 'app_sub_skill_index', methods: ['GET'])]
    public function index(SubSkillRepository $subSkillRepository): Response
    {
        return $this->render('bo/skills/sub_skill/index.html.twig', [
            'sub_skills' => $subSkillRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sub_skill_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $subSkill = new SubSkill();
        $form = $this->createForm(SubSkillType::class, $subSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($subSkill);
            $entityManager->flush();

            return $this->redirectToRoute('app_sub_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/sub_skill/new.html.twig', [
            'sub_skill' => $subSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sub_skill_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SubSkill $subSkill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SubSkillType::class, $subSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sub_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/sub_skill/edit.html.twig', [
            'sub_skill' => $subSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sub_skill_delete', methods: ['POST'])]
    public function delete(Request $request, SubSkill $subSkill, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subSkill->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($subSkill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sub_skill_index', [], Response::HTTP_SEE_OTHER);
    }
}
