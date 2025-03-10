<?php

namespace App\Controller\BO\Skill;

use App\Entity\Classe\Classe;
use App\Entity\Skill\Incantation;
use App\Form\Skill\IncantationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/incantation')]
final class IncantationController extends AbstractController
{

    #[Route('/new/{slug}', name: 'app_incantation_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $classe = $em->getRepository(Classe::class)->findOneBy(['slug' => $slug]);
        $incantation = new Incantation();
        $form = $this->createForm(IncantationType::class, $incantation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $incantation->setClasse($classe);
            $em->persist($incantation);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/incantation/new.html.twig', [
            'incantation' => $incantation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_incantation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Incantation $incantation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IncantationType::class, $incantation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/skills/incantation/edit.html.twig', [
            'incantation' => $incantation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_incantation_delete', methods: ['POST'])]
    public function delete(Request $request, Incantation $incantation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incantation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($incantation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
