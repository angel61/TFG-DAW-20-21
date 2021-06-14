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
        if (!$this->isGranted('ROLE_ADMIN'))
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
        yield MenuItem::linkToDashboard('Inicio', 'fa fa-home');

        yield MenuItem::section('Escritura');
        yield MenuItem::linkToCrud('Libros', 'fas fa-book', Libros::class);
        yield MenuItem::linkToCrud('Autores', 'fas fa-feather-alt', Autores::class);
        yield MenuItem::linkToCrud('Editoriales', 'fas fa-paragraph', Editoriales::class);
        yield MenuItem::linkToCrud('Categorias', 'fas fa-bookmark', Categorias::class);
        yield MenuItem::section('Noticias');
        yield MenuItem::linkToCrud('Noticias', 'fas fa-newspaper', Noticias::class);
        // yield MenuItem::linkToCrud('Comentarios', 'fa fa-tags', Comentarios::class);
        yield MenuItem::section('Administración');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', Usuarios::class);
        // yield MenuItem::linkToCrud('Redes sociales', 'fa fa-tags', RedesSociales::class);
    }
    
    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }
}
