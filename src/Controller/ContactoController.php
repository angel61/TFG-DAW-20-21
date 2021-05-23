<?php

namespace App\Controller;

use App\Form\ContactoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/contacto", name="contacto_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function contacto(Request $request, MailerInterface $mailer): Response
    {

        $form = $this->createForm(ContactoType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $contactoEstablezido = $form->getData();

            $email = (new Email())
                ->from('serverproyectocp@gmail.com')
                ->to('angellopezpalacios61@gmail.com')
                ->subject($contactoEstablezido['name'].' te ha contactado')
                ->html('<p><strong>Correo:</strong> '.$contactoEstablezido['from'].'</p><p><strong>Mensaje:</strong> '.$contactoEstablezido['message'].'</p>');

            $mailer->send($email);
            // var_dump($task);
            return $this->redirectToRoute('contacto');
        }


        return $this->render('contacto/contacto.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }
}
