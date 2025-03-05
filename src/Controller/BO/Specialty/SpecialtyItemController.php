<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\SpecialtyItem;
use App\Form\Specialty\SpecialtyItemType;
use App\Repository\Specialty\SpecialtyItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-item')]
final class SpecialtyItemController extends AbstractController
{
    #[Route(name: 'app_specialty_item_index', methods: ['GET'])]
    public function index(SpecialtyItemRepository $specialtyItemRepository): Response
    {
        return $this->render('bo/specialties/specialty_item/index.html.twig', [
            'specialty_items' => $specialtyItemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_specialty_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $specialtyItem = new SpecialtyItem();
        $form = $this->createForm(SpecialtyItemType::class, $specialtyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($specialtyItem);
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item/new.html.twig', [
            'specialty_item' => $specialtyItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialty_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpecialtyItem $specialtyItem, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialtyItemType::class, $specialtyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item/edit.html.twig', [
            'specialty_item' => $specialtyItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_item_delete', methods: ['POST'])]
    public function delete(Request $request, SpecialtyItem $specialtyItem, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialtyItem->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($specialtyItem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_specialty_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
