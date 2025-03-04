<?php

namespace App\Controller\View;

use App\Data\SearchData;
use App\Entity\Classe;
use App\Entity\Spell;
use App\Entity\SpellSchool;
use App\Form\SearchType;
use App\Repository\ClasseRepository;
use App\Repository\SpellSchoolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sort')]
final class ViewSpellController extends AbstractController
{
    #[Route('/listes', name: 'app_view_spell_index', methods: ['GET'])]
    public function index(ClasseRepository $classeRepository, SpellSchoolRepository $spellSchoolRepository): Response
    {
        return $this->render('client/spell/index.html.twig', [
            'classes' => $classeRepository->findAll(),
            'schools' => $spellSchoolRepository->findAll()
        ]);
    }

    #[Route('/tous', name: 'app_view_spell_all', methods: ['GET'])]
    public function indexAll(EntityManagerInterface $em, Request $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $spells = $em->getRepository(Spell::class)->findSearch($data);

        return $this->render('client/spell/listes/all.html.twig', [
            'sorts' => $spells,
            'classes' => $em->getRepository(Classe::class)->findAll(),
            'schools' => $em->getRepository(SpellSchool::class)->findAll(),
            'form' => $form->createView()
        ]);
    }

    #[Route('/niveau/liste', name: 'app_view_spell_levels', methods: ['GET'])]
    public function indexByLevels(): Response
    {
        return $this->render('client/spell/listes/levels.html.twig');
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

    #[Route('/classe/liste', name: 'app_view_spell_classes', methods: ['GET'])]
    public function indexByClasses(ClasseRepository $classeRepository): Response
    {
        return $this->render('client/spell/listes/classes.html.twig', [
            'classes' => $classeRepository->findAll()
        ]);
    }

    #[Route('/classe={slug}/liste', name: 'app_view_spell_classe', methods: ['GET'])]
    public function indexByClasse(string $slug, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);
        $sorts = $classe->getSpells();

        return $this->render('client/spell/listes/classe.html.twig', [
            'sorts' => $sorts,
            'classe' => $slug
        ]);
    }

    #[Route('/ecole/liste', name: 'app_view_spell_schools', methods: ['GET'])]
    public function indexBySchools(SpellSchoolRepository $spellSchoolRepository): Response
    {
        return $this->render('client/spell/listes/schools.html.twig', [
            'schools' => $spellSchoolRepository->findAll()
        ]);
    }

    #[Route('/ecole={slug}/liste', name: 'app_view_spell_school', methods: ['GET'])]
    public function indexBySchool(string $slug, EntityManagerInterface $em): Response
    {
        $school = $em->getRepository(SpellSchool::class)->findOneBy(['slug' => $slug]);
        $sorts = $em->getRepository(Spell::class)->findBy(['school' => $school]);

        return $this->render('client/spell/listes/school.html.twig', [
            'sorts' => $sorts,
            'school' => $school
        ]);
    }

    #[Route('/{slug}', name: 'app_view_spell_show', requirements: ['slug' => '.+'], methods: ['GET'])]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        $sort = $em->getRepository(Spell::class)->findOneBy(['slug' => $slug]);

        return $this->render('client/spell/show.html.twig', [
            'sort' => $sort,
        ]);
    } 
}
