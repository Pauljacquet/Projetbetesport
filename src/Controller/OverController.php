<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverController extends AbstractController
{
    #[Route('/over', name: 'app_over')]
    public function index(): Response
    {
        return $this->render('over/over.html.twig', [
            'controller_name' => 'OverController',
        ]);
    }
}
