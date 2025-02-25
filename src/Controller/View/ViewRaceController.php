<?php

namespace App\Controller\View;

use App\Entity\Race;
use App\Repository\RaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/race')]
final class ViewRaceController extends AbstractController
{
    #[Route(name: 'app_view_race_index', methods: ['GET'])]
    public function index(RaceRepository $raceRepository): Response
    {
        $commons = $raceRepository->findBy(['type' => 'Commun']);
        $exotics = $raceRepository->findBy(['type' => 'Exotique']);
        $monstruous = $raceRepository->findBy(['type' => 'Monstrueuse']);

        return $this->render('client/race/index.html.twig', [
            'commons' => $commons,
            'exotics' => $exotics,
            'monstruous' => $monstruous
        ]);
    }

    #[Route('/{slug}', name: 'app_view_race_show', methods: ['GET'])]
    public function show(string $slug, EntityManagerInterface $em): Response
    {
        $race = $em->getRepository(Race::class)->findOneBy(['slug' => $slug]);

        return $this->render('client/race/show.html.twig', [
            'race' => $race,
        ]);
    }
}
