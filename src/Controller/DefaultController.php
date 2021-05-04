<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="inicio", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}", name="inicio_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function inicio(Request $request, TranslatorInterface $translator): Response{
        //$translator->trans('layout.inicio');

        return $this->render('default/inicio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir') . '/..'),
            'locale' => $request->getLocale() 
        ]);
    }
    /**
     * @Route("/sobre_mi", name="sobreMi", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/sobre_mi", name="sobreMi_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function sobreMi(TranslatorInterface $translator): Response{
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>$translator->trans('layout.sobremi',[],'layout')
        ]);
    }
}