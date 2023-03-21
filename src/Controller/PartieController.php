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
    public function index(PartieRepository $partieRepository): Response
    {
        $partiesValo = $partieRepository->findBy(['tournois' => 'valo_']);
        $partiesLol = $partieRepository->findBy(['tournois' => 'lol_']);
        $partiesOver = $partieRepository->findBy(['tournois' => 'over_']);
        
        return $this->render('partie/index.html.twig', [
            'partiesValo' => $partiesValo,
            'partiesLol' => $partiesLol,
            'partiesOver' => $partiesOver,
        ]);
    }
}
