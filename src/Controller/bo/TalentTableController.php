<?php

namespace App\Controller\bo;

use App\Entity\TalentTable;
use App\Form\TalentTableType;
use App\Repository\TalentTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/talent-table')]
final class TalentTableController extends AbstractController
{
    #[Route(name: 'app_talent_table_index', methods: ['GET'])]
    public function index(TalentTableRepository $talentTableRepository): Response
    {
        return $this->render('bo/talent_table/index.html.twig', [
            'talent_tables' => $talentTableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_talent_table_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $talentTable = new TalentTable();
        $form = $this->createForm(TalentTableType::class, $talentTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($talentTable);
            $entityManager->flush();

            return $this->redirectToRoute('app_talent_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/talent_table/new.html.twig', [
            'talent_table' => $talentTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_table_show', methods: ['GET'])]
    public function show(TalentTable $talentTable): Response
    {
        return $this->render('bo/talent_table/show.html.twig', [
            'talent_table' => $talentTable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_talent_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TalentTable $talentTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TalentTableType::class, $talentTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_talent_table_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/talent_table/edit.html.twig', [
            'talent_table' => $talentTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_table_delete', methods: ['POST'])]
    public function delete(Request $request, TalentTable $talentTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$talentTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($talentTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_talent_table_index', [], Response::HTTP_SEE_OTHER);
    }
}
