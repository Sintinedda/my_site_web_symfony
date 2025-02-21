<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\SpecialtyItem;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/classe')]
final class ViewClasseController extends AbstractController
{
    #[Route('/liste', name: 'app_view_classe_index', methods: ['GET'])]
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('client/classe/index.html.twig', [
            'classes' => $classeRepository->findAll(),
        ]);
    }

    #[Route('/{slug}', name: 'app_view_classe_show', methods: ['GET'])]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['name' => $slug]);

        return $this->render('client/classe/show.html.twig', [
            'classe' => $classe,
        ]);
    }

    #[Route('/{slug}/spécialité={slug2}', name: 'app_view_specialty_show', methods: ['GET'])]
    public function showSpecialty(string $slug2, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['name' => $slug2]);

        return $this->render('client/classe/specialty.html.twig', [
            'specialty' => $specialty,
        ]);
    }
}
