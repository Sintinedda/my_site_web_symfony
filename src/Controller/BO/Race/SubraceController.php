<?php

namespace App\Controller\BO\Race;

use App\Entity\Race\Subrace;
use App\Form\Race\SubraceType;
use App\Repository\Race\SubraceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/subrace')]
final class SubraceController extends AbstractController
{
    #[Route(name: 'app_subrace_index', methods: ['GET'])]
    public function index(SubraceRepository $subraceRepository): Response
    {
        return $this->render('bo/races/subrace/index.html.twig', [
            'subraces' => $subraceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_subrace_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $subrace = new Subrace();
        $form = $this->createForm(SubraceType::class, $subrace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($subrace);
            $entityManager->flush();

            return $this->redirectToRoute('app_subrace_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/races/subrace/new.html.twig', [
            'subrace' => $subrace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_subrace_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Subrace $subrace, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SubraceType::class, $subrace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_subrace_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bo/races/subrace/edit.html.twig', [
            'subrace' => $subrace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_subrace_delete', methods: ['POST'])]
    public function delete(Request $request, Subrace $subrace, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subrace->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($subrace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_subrace_index', [], Response::HTTP_SEE_OTHER);
    }
}
