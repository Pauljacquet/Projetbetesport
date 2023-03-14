<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Entity\Tournoi;
use App\Repository\JeuRepository;
use App\Repository\TournoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TournoiController extends AbstractController
{
    #[Route('/tournoi', name: 'app_tournoi')]
    public function index(TournoiRepository $tournoiRepository): Tournoi
    {
        $tournois = $tournoiRepository->findOneBy([$jeux = 'valo']);
        $tournois = $tournoiRepository->findOneBy([$jeux = 'lol']);
        $tournois = $tournoiRepository->findOnyBy([$jeux = 'over']);
        return $tournois;
        return $jeux;
    }
}
