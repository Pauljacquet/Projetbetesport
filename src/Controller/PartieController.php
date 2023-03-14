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
        $partie = $partieRepository->findOneBy($tournoi = null);
        return $partie;
    }
}
