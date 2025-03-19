<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\SpecialtySkill;
use App\Entity\Specialty\SpecialtySkillList;
use App\Form\Specialty\SpecialtySkillListType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-skill-list')]
final class SpecialtySkillListController extends AbstractController
{
    #[Route('/new/{id}', name: 'app_specialty_skill_list_new', methods: ['GET', 'POST'])]
    public function new(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $skill = $em->getRepository(SpecialtySkill::class)->findOneBy(['id' => $id]);
        $specialtySkillList = new SpecialtySkillList();
        $form = $this->createForm(SpecialtySkillListType::class, $specialtySkillList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtySkillList->setSkill($skill);
            $em->persist($specialtySkillList);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill_list/new.html.twig', [
            'specialty_skill_list' => $specialtySkillList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialty_skill_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpecialtySkillList $specialtySkillList, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialtySkillListType::class, $specialtySkillList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill_list/edit.html.twig', [
            'specialty_skill_list' => $specialtySkillList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_skill_list_delete', methods: ['POST'])]
    public function delete(Request $request, SpecialtySkillList $specialtySkillList, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialtySkillList->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($specialtySkillList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
