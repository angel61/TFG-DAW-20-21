<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/contacto", name="contacto_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function contacto(TranslatorInterface $translator): Response{
        return $this->render('prueba/inicio.html.twig', [
            "texto"=>$translator->trans('layout.contacto',[],'layout')
        ]);
    }
}