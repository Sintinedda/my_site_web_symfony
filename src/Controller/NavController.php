<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Race;
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
        return $this->render('nav/index.html.twig', [
            'user' => $this->getUser(),
            'route' => $route,
            'classes' => $em->getRepository(Classe::class)->findAll(),
            'races' => $em->getRepository(Race::class)->findAll(),
        ]);
    }
}
