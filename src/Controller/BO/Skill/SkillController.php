<?php

namespace App\Controller\BO\Skill;

use App\Entity\Classe\Classe;
use App\Entity\Classe\ClasseByLevel;
use App\Entity\Skill\Incantation;
use App\Entity\Skill\Skill;
use App\Form\Skill\SkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/skill')]
final class SkillController extends AbstractController
{

    #[Route('/new/{slug}', name: 'app_skill_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $lvls = $form->get('lvl')->getData();
            foreach ($lvls as $lvl) {
                $classeLvl = $em->getRepository(ClasseByLevel::class)->findOneBy(['classe' => $classe, 'level' => $lvl]);
                $skill->addClasse($classeLvl);
            }
            $em->persist($skill);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/skill/new.html.twig', [
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_skill_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, Skill $skill, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $delLvls = $em->getRepository(ClasseByLevel::class)->findBy(['classe' => $classe]);
            foreach ($delLvls as $delLvl) {
                $skill->removeClasse($delLvl);
            }
            $lvls = $form->get('lvl')->getData();
            foreach ($lvls as $lvl) {
                $classeLvl = $em->getRepository(ClasseByLevel::class)->findOneBy(['classe' => $classe, 'level' => $lvl]);
                $skill->addClasse($classeLvl);
            }
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/skill/edit.html.twig', [
            'skill' => $skill,
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_skill_delete', methods: ['POST'])]
    public function delete(string $slug, Request $request, Skill $skill, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->getPayload()->getString('_token'))) {
            $delLvls = $em->getRepository(ClasseByLevel::class)->findBy(['classe' => $classe]);
            foreach ($delLvls as $delLvl) {
                $skill->removeClasse($delLvl);
                if ($skill->getName() == 'Incantation') {
                    $incantation = $em->getRepository(Incantation::class)->findOneBy(['classe' => $classe]);
                    if ($incantation) {
                        $em->remove($incantation);
                    }
                }
            }
            if ($skill->getClasse()->count() == 0) {
                $em->remove($skill);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
