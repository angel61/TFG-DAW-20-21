<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class NoticiasController extends AbstractController
{
    /**
     * @Route("/noticias", name="noticias", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/noticias", name="noticias_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function noticias(TranslatorInterface $translator): Response{
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>$translator->trans('layout.noticias',[],'layout')
        ]);
    }

    /**
     * @Route("/noticias/{id}", name="noticia", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/noticias/{id}", name="noticia_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function noticia($id): Response
    {
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>"noticia ".$id
        ]);
    }
}