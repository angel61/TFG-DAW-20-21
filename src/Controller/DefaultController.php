<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Autores;
use App\Entity\Editoriales;
use App\Entity\Libros;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Contracts\Translation\TranslatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="inicio", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}", name="inicio_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function inicio(Request $request, TranslatorInterface $translator): Response{
        //$translator->trans('layout.inicio');
        $idAutor= $this->getDoctrine()
        ->getRepository(Autores::class)
        ->find(1);
        $idEditorial= $this->getDoctrine()
        ->getRepository(Editoriales::class)
        ->find(1);
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Libros();
        $product->setAutor($idAutor);
        $product->setEditorial(($idEditorial));
        $product->setNombre('CICATRICES DE ÁFRICA');
        $product->setUrlCompra('https://www.amazon.es/CICATRICES-%C3%81FRICA-Apasionante-historia-aventuras-ebook/dp/B072FD3H3P');
        $product->setIsbn('8469735489');
        $product->setEan('B072FD3H3P');
        $product->setPaginas(349);
        $product->setDescripcionCorta('¿Qué pasa en el hospital de Ndogomji, en el corazón de África? ¿Por qué la vida de sus doctores y enfermeros es tan agitada? Allí se entremezclan un sinfín de pasiones, secretos y sufrimientos.');
        $product->setDescripcion('Hugo y Yolanda son mellizos y médicos que ejercen la profesión de forma apasionada. Él es alegre, enamoradizo y la atracción que siente por las mujeres, al principio, le lleva a debatirse entre el amor por una atractiva y divertida enfermera nativa, y una guapísima misionera llamada Teresa, que esconde un secreto intrigante y por la que sentirá un amor imposible. Su vida cambia radicalmente cuando una tragedia personal le golpea con fuerza.');
        $product->setDescripcionLarga('Hugo y Yolanda son mellizos y médicos que ejercen la profesión de forma apasionada. Él es alegre, enamoradizo y la atracción que siente por las mujeres, al principio, le lleva a debatirse entre el amor por una atractiva y divertida enfermera nativa, y una guapísima misionera llamada Teresa, que esconde un secreto intrigante y por la que sentirá un amor imposible. Su vida cambia radicalmente cuando una tragedia personal le golpea con fuerza.

        La brillante Yolanda, que dirige y organiza el hospital, se enfrentará a los graves problemas derivados de su responsabilidad. En lo personal, vive una vida aburrida hasta que conoce un atractivo guarda forestal, que le propone una excentricidad, una locura. Él le dijo: " vente conmigo y hagamos el amor en la selva entre las fieras y participemos de nuestra naturaleza salvaje".
        
        Un día llega al centro médico el padre Samuel, encargado de un orfanato próximo. Hacía un tiempo que había abandonado el ejercicio de la medicina, pero... ¿qué le llevó a dejar tan noble profesión? Su oculto pasado le pesaba demasiado.
        
        Muchos de los personajes de la novela tendrán cicatrices distintas, según las causas y la curación de las heridas sufridas. Ninguno dará importancia a estas marcas. Solo algunos sufrirán por las señales invisibles a la vista de los traumas vividos, y les costará encontrar la forma de recuperarse. Hugo, pese a su aparente banalidad, será capaz de ahondar en la realidad del convulso país para ver sus terribles cicatrices lo que le llevará a implicarse en la política de una nación oprimida por un régimen autoritario.
        
        Emprendieron una aventura en África que marcó sus vidas. Es una apasionada historia de acción, amor prohibido y de emociones intensas que engancha. El relato, se completa con pinceladas descriptivas del continente africano, de sus maravillosos paisajes de naturaleza virgen y fauna salvaje; de fiestas étnicas impregnadas de ritmos adictivos y de personajes singulares.');
        $product->setFechaPublicacion(new \DateTime('2017-05-12'));
        $product->setIdioma('Español');
        $product->setDestacado(1);
        $product->setPrecio(9.98);
        $product->setActivo(1);
        $product->setInicioDescuento(new \DateTime('0000-00-00'));
        $product->setFinDescuento(new \DateTime('0000-00-00'));
        $product->setDescuento(0);
        $product->setTopVentas(0);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('default/inicio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir') . '/..'),
            'locale' => $request->getLocale() 
        ]);
    }
    /**
     * @Route("/sobre_mi", name="sobreMi", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * @Route("/{_locale}/sobre_mi", name="sobreMi_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function sobreMi(TranslatorInterface $translator): Response{
        return $this->render('default/sobremi.html.twig', [
            
        ]);
    }
}