<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BraveKangarooController extends AbstractController
{
    #[Route('/brave/kangaroo', name: 'app_brave_kangaroo')]
    public function index(): Response
    {
        return $this->render('brave_kangaroo/index.html.twig', [
            'controller_name' => 'BraveKangarooController',
        ]);
    }
}
