<?php

namespace App\Controller;

use App\Entity\Comentarios;
use App\Entity\Noticias;
use App\Form\ComentariosType;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function noticia(Request $request, $id): Response
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


        $form = $this->createForm(ComentariosType::class);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $txtComentario = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $comentario = new Comentarios();
            $comentario->setTexto($txtComentario['comentario']);
            $comentario->setUsuario($this->getUser());
            $comentario->setNoticia($noticia);
            $comentario->setOculto(false);
            $comentario->setFechaPublicacion(new \DateTime("now"));
            $comentario->setUltimaEdicion(new \DateTime("now"));

            $entityManager->persist($comentario);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('noticias') . '/' . $id);
        }

        $comentarios = $this->getDoctrine()
            ->getRepository(Comentarios::class)
            ->getComentariosNoticia($id);

        $username = null;
        if ($this->getUser())
            $username = $this->getUser()->getUsername();


        return $this->render('noticias/noticia.html.twig', [
            "noticia" => $noticia,
            "form_coment" => $form->createView(),
            'comentarios' => $comentarios,
            "username" => $username,
        ]);
    }
}
