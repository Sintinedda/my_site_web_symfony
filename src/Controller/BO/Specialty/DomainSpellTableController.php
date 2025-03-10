<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\DomainSpellTable;
use App\Entity\Specialty\SpecialtyItem;
use App\Form\Specialty\DomainSpellTableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/domain-spell-table')]
final class DomainSpellTableController extends AbstractController
{
    #[Route('/new/{id2}', name: 'app_specialty_domain_spell_table_new', methods: ['GET', 'POST'])]
    public function new(int $id2, Request $request, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(SpecialtyItem::class)->findOneBy(['id' => $id2]);
        $domainSpellTable = new DomainSpellTable();
        $form = $this->createForm(DomainSpellTableType::class, $domainSpellTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $domainSpellTable->setDomain($specialty);
            $em->persist($domainSpellTable);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/domain_spell_table/new.html.twig', [
            'domain_spell_table' => $domainSpellTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialty_domain_spell_table_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DomainSpellTable $domainSpellTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DomainSpellTableType::class, $domainSpellTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/domain_spell_table/edit.html.twig', [
            'domain_spell_table' => $domainSpellTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialty_domain_spell_table_delete', methods: ['POST'])]
    public function delete(Request $request, DomainSpellTable $domainSpellTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$domainSpellTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($domainSpellTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
