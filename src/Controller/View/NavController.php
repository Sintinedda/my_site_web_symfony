<?php

namespace App\Controller\View;

use App\Entity\Classe;
use App\Entity\Race;
use App\Entity\SpellSchool;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class NavController extends AbstractController
{
    public function nav(
        $route,
        EntityManagerInterface $em
    ): Response
    {
        return $this->render('client/nav/index.html.twig', [
            'user' => $this->getUser(),
            'route' => $route,
            'schools' => $em->getRepository(SpellSchool::class)->findAll(),
            'classes' => $em->getRepository(Classe::class)->findAll(),
            'commons' => $em->getRepository(Race::class)->findBy(['type' => 'Commun']),
            'exotics' => $em->getRepository(Race::class)->findBy(['type' => 'Exotique']),
            'monstruous' => $em->getRepository(Race::class)->findBy(['type' => 'Monstrueuse']),
        ]);
    }
}
