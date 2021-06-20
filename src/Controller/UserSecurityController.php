<?php

namespace App\Controller;

use App\Entity\Usuarios;
use App\Form\LoginFormType;
use App\Form\RegistrationFormType;
use App\Security\AppAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserSecurityController extends AbstractController
{
    /**
     * @Route("/login", name="user_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('registration/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout(Request $request)
    {
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        // return "";
        $session = $request->getSession();
        $session->set('aaa', '/noticias');
        if ($targetPath = $request->query->get('_target_path'))
            return $this->redirectToRoute($targetPath);
        // return $this->redirectToRoute('admin');
    }
    /**
     * @Route("/logoutredirect", name="logout_redirect")
     */
    public function logoutRedirect(Request $request)
    {
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        // return "";

        if ($targetPath = $request->headers->get('referer'))
            return new RedirectResponse($targetPath);
        return $this->redirectToRoute('/');
    }

    /**
     * @Route("/registro", name="user_register")
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
            $user->setActivo(true);

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
