<?php

namespace App\Controller;

use App\Form\ContactoType;
use Exception;
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
    public function contacto(Request $request, MailerInterface $mailer, $resultado=null): Response
    {
        $sesion=$this->get('session');

        $form = $this->createForm(ContactoType::class);

        try {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $contactoEstablezido = $form->getData();

                $email = (new Email())
                    ->from('serverproyectocp@gmail.com')
                    ->to('angellopezpalacios61@gmail.com')
                    ->subject($contactoEstablezido['name'] . ' te ha contactado')
                    ->html('<p><strong>Correo:</strong> ' . $contactoEstablezido['from'] . '</p><p><strong>Mensaje:</strong> ' . $contactoEstablezido['message'] . '</p>');

                $mailer->send($email);
                
            $sesion->set(
                'resultado', 'Mensaje enviado con éxito.'
            );
            return $this->redirectToRoute("contacto");
                // return $this->redirectToRoute('contacto');
            }
        } catch (Exception $ex) {
            $resultado='No se pudo enviar el mensaje.';
            // $response->request->set('resultado', 'No se pudo enviar el mensaje.');
        }

        
        if($sesion->get("resultado")){
            $resultado=$sesion->get("resultado");
            $sesion->remove('resultado');
        }

        return $this->render('contacto/contacto.html.twig', [
            'our_form' => $form->createView(),
            'resultado' => $resultado,
        ]);
    }
}
