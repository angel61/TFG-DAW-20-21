<?php

namespace App\Controller;

use App\Entity\Libros;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibrosController extends AbstractController
{
    /**
     * @Route("/libros", name="libros", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     */
    public function libros(): Response
    {
        $idAutor=1;
        $libros = $this->getDoctrine()
            ->getRepository(Libros::class)
            ->getLibrosAutor($idAutor);
        $librosRecomendados = $this->getDoctrine()
            ->getRepository(Libros::class)
            ->getLibrosRecomendados($idAutor);

        return $this->render('libros/libros.html.twig', [
            'libros' => $libros,
            'librosRecomendados' => $librosRecomendados
        ]);
    }

    /**
     * @Route("/libros/{id}", name="libro", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     */
    public function libro($id): Response
    {
        $libro = $this->getDoctrine()
            ->getRepository(Libros::class)
            ->getLibroActivo($id);

            if ($this->getUser() !== null && in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {
                $libro = $this->getDoctrine()
                    ->getRepository(Libros::class)
                    ->getLibroAdmin($id);
            }


        if ($libro === null)
            throw (new Exception("Pagina no encontrada", 404));

        return $this->render('libros/libro.html.twig', [
            "libro" => $libro
        ]);
    }
}
