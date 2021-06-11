<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Libros;
use App\Entity\Noticias;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="inicio", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}", name="inicio_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function inicio(): Response
    {
        $libro = $this->getDoctrine()
            ->getRepository(Libros::class)
            ->getLibroPortada(1);

        $noticias = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiasActivas();

        return $this->render('default/inicio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir') . '/..'),
            // 'locale' => $request->getLocale(),
            'libro' => $libro,
            'noticias' => $noticias
        ]);
    }
    /**
     * @Route("/sobre_mi", name="sobreMi", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/sobre_mi", name="sobreMi_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function sobreMi(): Response
    {
        return $this->render('default/sobremi.html.twig', []);
    }
}
