<?php

namespace App\Controller\Admin;

use App\Entity\Autores;
use App\Entity\Categorias;
use App\Entity\Editoriales;
use App\Entity\Libros;
use App\Entity\Noticias;
use App\Entity\Usuarios;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
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
        if(!$this->isGranted('ROLE_ADMIN'))
            return $this->redirectToRoute('admin_login');
            return $this->render('EasyAdmin/content.html.twig');
            return parent::index();
            // return $this->get(Libros::class);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Panel de administrador');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToDashboard('Inicio', 'fa fa-home');

        yield MenuItem::section('Escritura');
        yield MenuItem::linkToCrud('Libros', 'fa fa-tags', Libros::class);
        yield MenuItem::linkToCrud('Autores', 'fa fa-tags', Autores::class);
        yield MenuItem::linkToCrud('Editoriales', 'fa fa-tags', Editoriales::class);
        yield MenuItem::linkToCrud('Categorias', 'fa fa-tags', Categorias::class);
        yield MenuItem::section('Noticias');
        yield MenuItem::linkToCrud('Noticias', 'fa fa-tags', Noticias::class);
        yield MenuItem::section('Administración');
        yield MenuItem::linkToCrud('Usuarios', 'fa fa-tags', Usuarios::class);
    }
    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }
}
