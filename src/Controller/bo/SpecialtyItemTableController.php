<?php

namespace App\Controller\bo;

use App\Entity\SpecialtyItemTable;
use App\Form\SpecialtyItemTableType;
use App\Repository\SpecialtyItemTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-item-table')]
final class SpecialtyItemTableController extends AbstractController
{
    #[Route(name: 'app_specialty_item_table_index', methods: ['GET'])]
    public function index(SpecialtyItemTableRepository $specialtyItemTableRepository): Response
    {
        return $this->render('bo/specialty_item_table/index.html.twig', [
            'specialty_item_tables' => $specialtyItemTableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_specialty_item_table_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $specialtyItemTable = new SpecialtyItemTable();
        $form = $this->createForm(SpecialtyItemTableType::class, $specialtyItemTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($specialtyItemTable);
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_item_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialty_item_table/new.html.twig', [
            'specialty_item_table' => $specialtyItemTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_item_table_show', methods: ['GET'])]
    public function show(SpecialtyItemTable $specialtyItemTable): Response
    {
        return $this->render('bo/specialty_item_table/show.html.twig', [
            'specialty_item_table' => $specialtyItemTable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialty_item_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpecialtyItemTable $specialtyItemTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialtyItemTableType::class, $specialtyItemTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_specialty_item_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialty_item_table/edit.html.twig', [
            'specialty_item_table' => $specialtyItemTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_item_table_delete', methods: ['POST'])]
    public function delete(Request $request, SpecialtyItemTable $specialtyItemTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialtyItemTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($specialtyItemTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_specialty_item_table_index', [], Response::HTTP_SEE_OTHER);
    }
}
