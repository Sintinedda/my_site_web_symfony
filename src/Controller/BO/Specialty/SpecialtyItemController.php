<?php

namespace App\Controller\BO\Specialty;

use App\Entity\Specialty\Specialty;
use App\Entity\Specialty\SpecialtyItem;
use App\Form\Specialty\SpecialtyItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/specialty-item')]
final class SpecialtyItemController extends AbstractController
{

    #[Route('/new/{id2}', name: 'app_specialty_item_new', methods: ['GET', 'POST'])]
    public function new(int $id2, Request $request, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(Specialty::class)->findOneBy(['id' => $id2]);
        $specialtyItem = new SpecialtyItem();
        $form = $this->createForm(SpecialtyItemType::class, $specialtyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialtyItem->setSpecialty($specialty);
            $em->persist($specialtyItem);
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item/new.html.twig', [
            'specialty_item' => $specialtyItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/{id2}', name: 'app_specialty_item_edit', methods: ['GET', 'POST'])]
    public function edit(int $id2, Request $request, SpecialtyItem $specialtyItem, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SpecialtyItemType::class, $specialtyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/specialties/specialty_item/edit.html.twig', [
            'specialty_item' => $specialtyItem,
            'specialty' => $em->getRepository(Specialty::class)->findOneBy(['id' => $id2]),
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{id2}', name: 'app_specialty_item_delete', methods: ['POST'])]
    public function delete(int $id2, Request $request, SpecialtyItem $specialtyItem, EntityManagerInterface $em): Response
    {
        $specialty = $em->getRepository(Specialty::class)->findOneBy(['id' => $id2]);

        if ($this->isCsrfTokenValid('delete'.$specialtyItem->getId(), $request->getPayload()->getString('_token'))) {
            $specialtyItem->removeSpecialty($specialty);
            if ($specialtyItem->getSpecialty()->count() == 0) {
                $em->remove($specialtyItem);
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
