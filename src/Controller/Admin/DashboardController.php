<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Project;
use App\Entity\Tag;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/fledgless', name: 'fledgless')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        
        yield MenuItem::linkToRoute('Retour sur le site', 'fa fa-undo', 'app_home');

        yield MenuItem::linkToLogout('Déconnexion', 'fas fa-right-from-bracket');

        yield MenuItem::section('Projets');
        yield MenuItem::subMenu('Projets', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Tous les projets', 'fas fa-list', Project::class),
            MenuItem::linkToCrud('Nouveau projet', 'fas fa-plus', Project::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Tags', 'fas fa-hashtag')->setSubItems([
            MenuItem::linkToCrud('Tous les tags', 'fas fa-list', Tag::class),
            MenuItem::linkToCrud('Nouveau tag', 'fas fa-plus', Tag::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Images', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Toutes les images', 'fas fa-list', Image::class),
            MenuItem::linkToCrud('Nouvelle image', 'fas fa-plus', Image::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
