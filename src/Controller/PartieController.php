<?php

namespace App\Controller;

use App\Entity\Partie;
use App\Repository\PartieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartieController extends AbstractController
{
    #[Route('/partie', name: 'app_partie')]
    public function index(PartieRepository $partieRepository): Partie
    {
        $parties = $partieRepository->findOneBy([$tournois = 'valo_']);
        $parties = $partieRepository->findOneBy([$tournois = 'lol_']);
        $parties = $partieRepository->findOnyBy([$tournois = 'over_']);
        return $parties;
        return $tournois;
    }
}
