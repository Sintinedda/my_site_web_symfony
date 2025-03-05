<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\Specialty;
use App\Form\Specialty\SpecialtyType;
use App\Repository\Specialty\SpecialtyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty')]
final class SpecialtyController extends AbstractController
{
    #[Route(name: 'app_specialty_index', methods: ['GET'])]
    public function index(SpecialtyRepository $specialtyRepository): Response
    {
        return $this->render('bo/specialties/specialty/index.html.twig', [
            'specialties' => $specialtyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_specialty_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $specialty = new Specialty();
        $form = $this->createForm(SpecialtyType::class, $specialty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($specialty);
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty/new.html.twig', [
            'specialty' => $specialty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialty_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Specialty $specialty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialtyType::class, $specialty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty/edit.html.twig', [
            'specialty' => $specialty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_delete', methods: ['POST'])]
    public function delete(Request $request, Specialty $specialty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialty->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($specialty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_specialty_index', [], Response::HTTP_SEE_OTHER);
    }
}
