<?php

namespace App\Controller\bo;

use App\Entity\ClasseByLevel;
use App\Form\ClasseByLevelType;
use App\Repository\ClasseByLevelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/classe-by-level')]
final class ClasseByLevelController extends AbstractController
{
    #[Route(name: 'app_classe_by_level_index', methods: ['GET'])]
    public function index(ClasseByLevelRepository $classeByLevelRepository): Response
    {
        return $this->render('bo/classe_by_level/index.html.twig', [
            'classe_by_levels' => $classeByLevelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_classe_by_level_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $classeByLevel = new ClasseByLevel();
        $form = $this->createForm(ClasseByLevelType::class, $classeByLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($classeByLevel);
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_by_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classe_by_level/new.html.twig', [
            'classe_by_level' => $classeByLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classe_by_level_show', methods: ['GET'])]
    public function show(ClasseByLevel $classeByLevel): Response
    {
        return $this->render('bo/classe_by_level/show.html.twig', [
            'classe_by_level' => $classeByLevel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classe_by_level_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClasseByLevel $classeByLevel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClasseByLevelType::class, $classeByLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_by_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/classe_by_level/edit.html.twig', [
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

        return $this->redirectToRoute('app_classe_by_level_index', [], Response::HTTP_SEE_OTHER);
    }
}
