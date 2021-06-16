<?php

namespace App\Controller;

use App\Entity\Noticias;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NoticiasController extends AbstractController
{
    /**
     * @Route("/noticias", name="noticias", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     */
    public function noticias(): Response
    {
        $noticia = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiaImportante();

        $noticias = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiasActivas();

        return $this->render('noticias/noticias.html.twig', [
            'noticiaPortada' => $noticia,
            'noticias' => $noticias
        ]);
    }

    /**
     * @Route("/noticias/{id}", name="noticia", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     */
    public function noticia($id): Response
    {
        $noticia = $this->getDoctrine()
            ->getRepository(Noticias::class)
            ->getNoticiaActiva($id);

        // if ($this->getUser() !== null)
            if ($this->getUser() !== null && in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {
                $noticia = $this->getDoctrine()
                    ->getRepository(Noticias::class)
                    ->getNoticiaAdmin($id);
            }

        if ($noticia === null)
            throw (new Exception("Pagina no encontrada", 404));

        /* 
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comentario = $form->getData();
            $comentario->setUsuario($this->getUser());
            $comentario->setNoticia($noticia);
            $comentario->setOculto(false);
            $comentario->setFechaPublicacion(new DateTime("now"));
            $comentario->getUltimaEdicion(new DateTime("now"));

            // return $this->redirectToRoute('task_success');
        }
         */

        return $this->render('noticias/noticia.html.twig', [
            "noticia" => $noticia
        ]);
    }
}
