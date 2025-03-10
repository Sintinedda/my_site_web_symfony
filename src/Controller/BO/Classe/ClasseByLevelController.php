<?php

namespace App\Controller\BO\Classe;

use App\Entity\Classe\Classe;
use App\Entity\Classe\ClasseByLevel;
use App\Form\Classe\ClasseByLevelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/classe-by-level')]
final class ClasseByLevelController extends AbstractController
{

    #[Route('/new/{slug}', name: 'app_classe_by_level_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $classeByLevel = new ClasseByLevel();
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(ClasseByLevelType::class, $classeByLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classeByLevel->setClasse($classe);
            $em->persist($classeByLevel);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classes/classe_by_level/new.html.twig', [
            'classe_by_level' => $classeByLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classe_by_level_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClasseByLevel $classeByLevel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClasseByLevelType::class, $classeByLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classes/classe_by_level/edit.html.twig', [
            'classe_by_level' => $classeByLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classe_by_level_delete', methods: ['POST'])]
    public function delete(Request $request, ClasseByLevel $classeByLevel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classeByLevel->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($classeByLevel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
