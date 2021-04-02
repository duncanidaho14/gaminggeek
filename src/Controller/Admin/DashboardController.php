<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Image;
use App\Entity\Video;
use App\Entity\Categorie;
use App\Entity\Jeuxvideo;
use App\Entity\Plateforme;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gaminggeek');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Jeux vidéo', 'fa fa-gamepad', Jeuxvideo::class);
        yield MenuItem::linkToCrud('Catégorie', 'fa fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Plateforme', 'fa fa-television', Plateforme::class);
        yield MenuItem::linkToCrud('Image', 'fa fa-picture-o', Image::class);
        yield MenuItem::linkToCrud('Vidéo', 'fa fa-video-camera', Video::class);
    }
}
