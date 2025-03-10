<?php

namespace App\Controller\BO\StatBlock;

use App\Entity\StatBlock\StatBlock;
use App\Entity\StatBlock\StatBlockSkill;
use App\Form\StatBlock\StatBlockSkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stat-block-skill')]
final class StatBlockSkillController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_stat_block_skill_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $statBlockSkill = new StatBlockSkill();
        $form = $this->createForm(StatBlockSkillType::class, $statBlockSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockSkill->setStatblock($sb);
            $em->persist($statBlockSkill);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_skill/new.html.twig', [
            'stat_block_skill' => $statBlockSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_stat_block_skill_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, StatBlockSkill $statBlockSkill, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(StatBlockSkillType::class, $statBlockSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statBlockSkill->setStatblock($sb);
            $em->flush();

            return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/stat_block_skill/edit.html.twig', [
            'stat_block_skill' => $statBlockSkill,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_stat_block_skill_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, StatBlockSkill $statBlockSkill, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(StatBlock::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$statBlockSkill->getId(), $request->getPayload()->getString('_token'))) {
            $statBlockSkill->removeStatblock($sb);
            if ($statBlockSkill->getStatblock()->count() == 0) {
                $em->remove($statBlockSkill);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_stat_block_index', [], Response::HTTP_SEE_OTHER);
    }
}
