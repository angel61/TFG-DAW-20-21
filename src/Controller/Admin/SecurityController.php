<?php
namespace App\Controller\Admin;

use App\Entity\Usuarios;
use App\Form\RegistrationFormType;
use App\Security\AppAuthenticator;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/admin/login", name="admin_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@!EasyAdmin/page/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
            'translation_domain' => 'admin',
            'page_title' => 'Administración',
            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl('admin'),
            'username_label' => 'Usuario',
            'password_label' => 'Contraseña',
            'sign_in_label' => 'Log in',
            'username_parameter' => 'username',
            'password_parameter' => 'password',
        ]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logout()
    {
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        // return "";
    // return $this->redirectToRoute('admin');
    }
    
    /**
     * @Route("/admin/register", name="admin_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, AppAuthenticator $authenticator): Response
    {
        $user = new Usuarios();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'admin' 
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}