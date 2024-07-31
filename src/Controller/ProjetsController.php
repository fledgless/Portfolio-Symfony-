<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'app_projets')]
    public function index(ProjectRepository $projectRepo): Response
    {
        return $this->render('projets/index.html.twig', [
            'projects' => $projectRepo->findAll(),
        ]);
    }
}
