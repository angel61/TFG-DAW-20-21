<?php
// src/Controller/PruebaController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PruebaController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function number(int $max=100): Response
    {
        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
    /**
     * @Route("/xd")
     */
    public function inicio(): Response
    {
        $texto = 'eres muy gordoooooo :D';

        return $this->render('prueba/inicio.html.twig', [
            'texto' => $texto,
        ]);
    }
}
