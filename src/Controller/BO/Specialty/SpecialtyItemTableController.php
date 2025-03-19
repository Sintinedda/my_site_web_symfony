<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\SpecialtyItem;
use App\Entity\Specialty\SpecialtyItemTable;
use App\Form\Specialty\SpecialtyItemTableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-item-table')]
final class SpecialtyItemTableController extends AbstractController
{
    #[Route('/new/{slug}', name: 'app_specialty_item_table_new', methods: ['GET', 'POST'])]
    public function new(string $slug, Request $request, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['slug' => $slug]);
        $specialtyItemTable = new SpecialtyItemTable();
        $form = $this->createForm(SpecialtyItemTableType::class, $specialtyItemTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtyItemTable->addSpecialty($specialty);
            $em->persist($specialtyItemTable);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item_table/new.html.twig', [
            'specialty_item_table' => $specialtyItemTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{slug}', name: 'app_specialty_item_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SpecialtyItemTable $specialtyItemTable, string $slug, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['slug' => $slug]);
        $form = $this->createForm(SpecialtyItemTableType::class, $specialtyItemTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtyItemTable->addSpecialty($specialty);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item_table/edit.html.twig', [
            'specialty_item_table' => $specialtyItemTable,
            'form' => $form,
            'specialty' => $specialty
        ]);
    }

    #[Route('/{id}/{slug}', name: 'app_specialty_item_table_delete', methods: ['POST'])]
    public function delete(Request $request, SpecialtyItemTable $specialtyItemTable, string $slug, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['slug' => $slug]);

        if ($this->isCsrfTokenValid('delete'.$specialtyItemTable->getId(), $request->getPayload()->getString('_token'))) {
            $specialtyItemTable->removeSpecialty($specialty);
            if ($specialtyItemTable->getSpecialties($specialty)->count() == 0) {
                $em->remove($specialtyItemTable);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
