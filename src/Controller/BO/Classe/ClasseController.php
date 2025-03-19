<?php

namespace App\Controller\BO\Classe;

use App\Entity\Classe\Classe;
use App\Entity\Skill\Skill;
use App\Entity\Specialty\SpecialtyItem;
use App\Entity\Specialty\SpecialtyItemTable;
use App\Entity\Specialty\SpecialtySkill;
use App\Entity\Specialty\SpecialtySkillTable;
use App\Form\Classe\ClasseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/classe')]
final class ClasseController extends AbstractController
{
    #[Route(name: 'app_classe_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('bo/classes/classe/index.html.twig', [
            'classes' => $em->getRepository(Classe::class)->findAll(),
            'skills' => $em->getRepository(Skill::class)->findAll(),
            'specialties' => $em->getRepository(SpecialtyItem::class)->findAll(),
            'speTables' => $em->getRepository(SpecialtyItemTable::class)->findAll(),
            'speSkills' => $em->getRepository(SpecialtySkill::class)->findAll(),
            'speSkillTables' => $em->getRepository(SpecialtySkillTable::class)->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_classe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $classe = new Classe();
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($classe);
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classes/classe/new.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Classe $classe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classes/classe/edit.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classe_delete', methods: ['POST'])]
    public function delete(Request $request, Classe $classe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classe->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($classe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
