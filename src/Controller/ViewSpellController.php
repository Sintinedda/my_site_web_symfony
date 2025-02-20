<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Spell;
use App\Repository\ClasseRepository;
use App\Repository\SpellRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sort')]
final class ViewSpellController extends AbstractController
{
    #[Route('/listes', name: 'app_view_spell_index', methods: ['GET'])]
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('client/spell/index.html.twig', [
            'classes' => $classeRepository->findAll()
        ]);
    }

    #[Route('/tous', name: 'app_view_spell_all', methods: ['GET'])]
    public function indexAll(SpellRepository $spellRepository): Response
    {
        return $this->render('client/spell/listes/all.html.twig', [
            'sorts' => $spellRepository->findAll()
        ]);
    }

    #[Route('/niveau={level}/liste', name: 'app_view_spell_level', methods: ['GET'])]
    public function indexByLevel(int $level, EntityManagerInterface $em): Response
    {
        $sorts = $em->getRepository(Spell::class)->findBy(['level' => $level]);

        return $this->render('client/spell/listes/level.html.twig', [
            'sorts' => $sorts,
            'level' => $level
        ]);
    }

    #[Route('/classe={slug}/liste', name: 'app_view_spell_classe', methods: ['GET'])]
    public function indexByClasse(string $slug, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['name' => $slug]);
        $sorts = $classe->getSpells();

        return $this->render('client/spell/listes/classe.html.twig', [
            'sorts' => $sorts,
            'classe' => $slug
        ]);
    }

    #[Route('/école={slug}/liste', name: 'app_view_spell_school', methods: ['GET'])]
    public function indexBySchool(string $slug, EntityManagerInterface $em): Response
    {
        $sorts = $em->getRepository(Spell::class)->findBy(['school' => $slug]);

        return $this->render('client/spell/listes/school.html.twig', [
            'sorts' => $sorts,
            'school' => $slug
        ]);
    }

    #[Route('/{slug}', name: 'app_view_spell_show', requirements: ['slug' => '.+'], methods: ['GET'])]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        $sort = $em->getRepository(Spell::class)->findOneBy(['name_fr' => $slug]);

        return $this->render('client/spell/show.html.twig', [
            'sort' => $sort,
        ]);
    } 
}
