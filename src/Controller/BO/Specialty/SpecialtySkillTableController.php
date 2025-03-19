<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\SpecialtySkill;
use App\Entity\Specialty\SpecialtySkillTable;
use App\Form\Specialty\SpecialtySkillTableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-skill-table')]
final class SpecialtySkillTableController extends AbstractController
{
    #[Route('/new/{id2}', name: 'app_specialty_skill_table_new', methods: ['GET', 'POST'])]
    public function new(int $id2, Request $request, EntityManagerInterface $em): Response
    {
        $skill = $em->getRepository(SpecialtySkill::class)->findOneBy(['id' =>$id2]);
        $specialtySkillTable = new SpecialtySkillTable();
        $form = $this->createForm(SpecialtySkillTableType::class, $specialtySkillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtySkillTable->addSkill($skill);
            $em->persist($specialtySkillTable);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill_table/new.html.twig', [
            'specialty_skill_table' => $specialtySkillTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{id2}', name: 'app_specialty_skill_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpecialtySkillTable $specialtySkillTable, int $id2, EntityManagerInterface $em): Response
    {
        $skill = $em->getRepository(SpecialtySkill::class)->findOneBy(['id' =>$id2]);
        $form = $this->createForm(SpecialtySkillTableType::class, $specialtySkillTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtySkillTable->addSkill($skill);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_skill_table/edit.html.twig', [
            'specialty_skill_table' => $specialtySkillTable,
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{id2}', name: 'app_specialty_skill_table_delete', methods: ['POST'])]
    public function delete(Request $request, SpecialtySkillTable $specialtySkillTable, int $id2, EntityManagerInterface $em): Response
    {
        $skill = $em->getRepository(SpecialtySkill::class)->findOneBy(['id' =>$id2]);

        if ($this->isCsrfTokenValid('delete'.$specialtySkillTable->getId(), $request->getPayload()->getString('_token'))) {
            $specialtySkillTable->removeSkill($skill);
            if ($specialtySkillTable->getSkills()->count() == 0) {
                $em->remove($specialtySkillTable);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
