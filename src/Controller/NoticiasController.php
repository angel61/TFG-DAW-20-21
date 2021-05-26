<?php

namespace App\Controller;

use App\Entity\Noticias;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class NoticiasController extends AbstractController
{
    /**
     * @Route("/noticias", name="noticias", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/noticias", name="noticias_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function noticias(TranslatorInterface $translator): Response
    {

        $noticias = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiasActivas();

        return $this->render('noticias/noticias.html.twig', [
            'noticias' => $noticias
        ]);
    }

    /**
     * @Route("/noticias/{id}", name="noticia", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/noticias/{id}", name="noticia_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function noticia($id): Response
    {
        $noticia = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiaActiva($id);

        if ($noticia === null)
            throw (new Exception("Pagina no encontrada", 404));

        return $this->render('noticias/noticia.html.twig', [
            "noticia" => $noticia
        ]);
    }
}
