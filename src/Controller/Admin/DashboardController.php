<?php

namespace App\Controller\Admin;

use App\Entity\Autores;
use App\Entity\Editoriales;
use App\Entity\Libros;
use App\Entity\Noticias;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Blog');
        yield MenuItem::linkToCrud('Autores', 'fa fa-tags', Autores::class);
        yield MenuItem::linkToCrud('Editoriales', 'fa fa-tags', Editoriales::class);
        yield MenuItem::linkToCrud('Libros', 'fa fa-tags', Libros::class);
        yield MenuItem::linkToRoute ('Blog Posts', 'fa fa-file-text', 'panel2');
    }
}
