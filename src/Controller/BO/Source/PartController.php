<?php

namespace App\Controller\BO\Source;

use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Form\Source\PartType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/source-part')]
final class PartController extends AbstractController
{
    #[Route('/new/{id}', name: 'app_source_part_new', methods: ['GET', 'POST'])]
    public function new(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $source = $em->getRepository(Source::class)->findOneBy(['id' => $id]);
        $part = new Part();
        $form = $this->createForm(PartType::class, $part);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $part->setSource($source);
            $em->persist($part);
            $em->flush();

            return $this->redirectToRoute('app_source_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/source/part/new.html.twig', [
            'part' => $part,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_source_part_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Part $part, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PartType::class, $part);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_source_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/source/part/edit.html.twig', [
            'part' => $part,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_source_part_delete', methods: ['POST'])]
    public function delete(Request $request, Part $part, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$part->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($part);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_source_index', [], Response::HTTP_SEE_OTHER);
    }
}
