<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CrudUserController extends AbstractController
{
    #[Route('/crud/user', name: 'app_crud_user')]
    public function index(): Response
    {
        return $this->render('crud_user/index.html.twig', [
            'controller_name' => 'CrudUserController',
        ]);
    }
}
