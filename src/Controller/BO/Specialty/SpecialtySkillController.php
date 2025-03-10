<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\SpecialtyItem;
use App\Entity\Specialty\SpecialtySkill;
use App\Form\Specialty\SpecialtySkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-skill')]
final class SpecialtySkillController extends AbstractController
{
    #[Route('/new/{id2}', name: 'app_specialty_skill_new', methods: ['GET', 'POST'])]
    public function new(int $id2, Request $request, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['id' => $id2]);
        $specialtySkill = new SpecialtySkill();
        $form = $this->createForm(SpecialtySkillType::class, $specialtySkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtySkill->setSpecialty($specialty);
            $em->persist($specialtySkill);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill/new.html.twig', [
            'specialty_skill' => $specialtySkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{id2}', name: 'app_specialty_skill_edit', methods: ['GET', 'POST'])]
    public function edit(int $id2, Request $request, SpecialtySkill $specialtySkill, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['id' => $id2]);
        $form = $this->createForm(SpecialtySkillType::class, $specialtySkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtySkill->setSpecialty($specialty);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill/edit.html.twig', [
            'specialty_skill' => $specialtySkill,
            'specialty' => $specialty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{id2}', name: 'app_specialty_skill_delete', methods: ['POST'])]
    public function delete(int $id2, Request $request, SpecialtySkill $specialtySkill, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['id' => $id2]);

        if ($this->isCsrfTokenValid('delete'.$specialtySkill->getId(), $request->getPayload()->getString('_token'))) {
            $specialtySkill->removeSpecialty($specialty);
            if ($specialtySkill->getSpecialty()->count() == 0) {
                $em->remove($specialtySkill);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
