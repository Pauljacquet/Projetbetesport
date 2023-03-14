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
        $tournoi = $tournoiRepository->findOneBy($jeu = null);
        return $tournoi;
    }
}
