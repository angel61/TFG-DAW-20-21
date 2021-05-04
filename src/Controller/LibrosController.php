<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class LibrosController extends AbstractController
{
    /**
     * @Route("/libros", name="libros", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/libros", name="libros_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function libros(TranslatorInterface $translator): Response{
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>$translator->trans('layout.libros',[],'layout')
        ]);
    }

    /**
     * @Route("/libros/{id}", name="libro", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/libros/{id}", name="libro_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function libro($id): Response
    {
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>"libro ".$id
        ]);
    }
}