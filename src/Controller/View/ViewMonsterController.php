<?php

namespace App\Controller\View;

use App\Entity\Monster\SB;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/monstre')]
final class ViewMonsterController extends AbstractController
{
    #[Route('s', name: 'app_view_monster', methods: 'GET')]
    public function index(EntityManagerInterface $em): Response
    {
        $monsters = $em->getRepository(SB::class)->findAll();

        return $this->render('client/monster/index.html.twig', [
            'monsters' => $monsters
        ]);
    }

    #[Route('/{slug}', name: 'app_view_monster_show', requirements: ['slug' => '.+'], methods: 'GET')]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        return $this->render('client/monster/show.html.twig', [
            'monster' => $em->getRepository(SB::class)->findOneBy(['slug' => $slug])
        ]);
    }
}