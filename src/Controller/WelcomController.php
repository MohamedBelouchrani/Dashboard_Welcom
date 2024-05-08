<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WelcomController extends AbstractController
{
    #[Route('/', name: 'app_welcom')]
    public function index(): Response
    {
        return $this->render('welcom/index.html.twig', [
            'controller_name' => 'WelcomController',
        ]);
    }
}
