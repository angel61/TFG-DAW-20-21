<?php

namespace App\Controller;

use App\Entity\Autores;
use App\Entity\Libros;
use App\Repository\LibrosRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibrosController extends AbstractController
{
    /**
     * @Route("/libros", name="libros", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/libros", name="libros_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function libros(): Response
    {
        $libros = $this->getDoctrine()
            ->getRepository(Libros::class)
            ->getLibrosAutor(1);

        return $this->render('libros/libros.html.twig', [
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/{id}", name="libro", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/libros/{id}", name="libro_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function libro($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $libro=$entityManager->getRepository(Libros::class)->find($id);

        return $this->render('libros/libro.html.twig', [
            "libro" => $libro
        ]);
    }
}
