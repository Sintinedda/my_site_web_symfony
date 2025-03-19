<?php

namespace App\Controller\BO\Monster;

use App\Entity\Monster\SB;
use App\Entity\Monster\SBSkill;
use App\Form\Monster\SBSkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/sb-skill')]
final class SBSkillController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_sb_skill_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $sbSkill = new SBSkill();
        $form = $this->createForm(SBSkillType::class, $sbSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbSkill->addMonsters($sb);
            $em->persist($sbSkill);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_skill/new.html.twig', [
            'sbSkill' => $sbSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_sb_skill_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, SBSkill $sbSkill, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SBSkillType::class, $sbSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sbSkill->addMonsters($sb);
            $em->flush();

            return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/sb/sb_skill/edit.html.twig', [
            'sbSkill' => $sbSkill,
            'form' => $form,
            'sb' => $sb
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_sb_skill_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, SBSkill $sbSkill, EntityManagerInterface $em): Response
    {
        $sb = $em->getRepository(SB::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$sbSkill->getId(), $request->getPayload()->getString('_token'))) {
            $sbSkill->removeMonsters($sb);
            if ($sbSkill->getMonsters()->count() == 0) {
                $em->remove($sbSkill);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_sb', [], Response::HTTP_SEE_OTHER);
    }
}