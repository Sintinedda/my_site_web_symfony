<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/classe')]
final class ClassesController extends AbstractController
{
    #[Route('/liste', name: 'app_view_classe_index', methods: ['GET'])]
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('classes/index.html.twig', [
            'classes' => $classeRepository->findAll(),
        ]);
    }

    #[Route('/{slug}', name: 'app_view_classe_show', methods: ['GET'])]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['name' => $slug]);

        return $this->render('classes/show.html.twig', [
            'classe' => $classe,
        ]);
    }
}
