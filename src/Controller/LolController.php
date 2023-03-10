<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LolController extends AbstractController
{
    #[Route('/lol', name: 'app_lol')]
    public function index(): Response
    {
        return $this->render('lol/lol.html.twig', [
            'controller_name' => 'LolController',
        ]);
    }
}
