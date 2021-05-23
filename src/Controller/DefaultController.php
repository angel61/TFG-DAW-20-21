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
     * Route("/{_locale}", name="inicio_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function inicio(Request $request, TranslatorInterface $translator): Response{
        //$translator->trans('layout.inicio');
//         $idAutor= $this->getDoctrine()
//         ->getRepository(Autores::class)
//         ->find(1);
//         $idEditorial= $this->getDoctrine()
//         ->getRepository(Editoriales::class)
//         ->find(1);
//         $entityManager = $this->getDoctrine()->getManager();
//         $product = new Libros();
//         $product->setAutor($idAutor);
//         $product->setEditorial(($idEditorial));
//         $product->setNombre('Arde África');
//         $product->setUrlCompra('https://www.amazon.es/Arde-%C3%81frica-Apasionante-historia-aventuras/dp/840916826X/ref=pd_bxgy_img_2/260-0755414-0082916?_encoding=UTF8&pd_rd_i=840916826X&pd_rd_r=f1b396ef-0042-4c14-917e-323192c70c96&pd_rd_w=j8eSk&pd_rd_wg=15nj7&pf_rd_p=1e5224b7-4b05-43dc-b9bd-5f16e5a29bac&pf_rd_r=1EVZGKBV4B0AWKQGFHR3&psc=1&refRID=1EVZGKBV4B0AWKQGFHR3');
//         $product->setIsbn('840916826X');
//         $product->setEan('9788409168262');
//         $product->setPaginas(312);
//         $product->setDescripcionCorta('¿Qué harías tú si estuvieras a punto de perder la vida sin saber por qué?
// Me llamo Yolanda Ortega, soy médica cooperante de un centro sanitario africano y estaba viviendo mi sueño, no podía ser más feliz. Pero ahora todo a mi alrededor se desmorona, me encuentro en una situación desesperada.');
//         $product->setDescripcion('¿Qué harías tú si estuvieras a punto de perder la vida sin saber por qué?
//         Me llamo Yolanda Ortega, soy médica cooperante de un centro sanitario africano y estaba viviendo mi sueño, no podía ser más feliz. Pero ahora todo a mi alrededor se desmorona, me encuentro en una situación desesperada. El país está al borde de una guerra civil, mis compañeros del hospital, desbordados por tanto trabajo y los que quiero han desaparecido.
//         Las imágenes del satélite de la NASA desvelan que arde África mientras que una oleada de fuegos de origen desconocido devastan la capital del país. Muchos se preguntan si ambos hechos tienen alguna relación, pero yo, que me enfrento a la muerte, solo me cuestiono la razón de lo que me ocurre.');
//         $product->setDescripcionLarga('¿Qué harías tú si estuvieras a punto de perder la vida sin saber por qué?
//         Me llamo Yolanda Ortega, soy médica cooperante de un centro sanitario africano y estaba viviendo mi sueño, no podía ser más feliz. Pero ahora todo a mi alrededor se desmorona, me encuentro en una situación desesperada. El país está al borde de una guerra civil, mis compañeros del hospital, desbordados por tanto trabajo y los que quiero han desaparecido.
//         Las imágenes del satélite de la NASA desvelan que arde África mientras que una oleada de fuegos de origen desconocido devastan la capital del país. Muchos se preguntan si ambos hechos tienen alguna relación, pero yo, que me enfrento a la muerte, solo me cuestiono la razón de lo que me ocurre.
//         ¿Será definitivamente el fuego lo que dé fin a mi existencia?
//         QUÉ COMENTAN LOS LECTORES:
//         “Es una apasionada historia de acción y de emociones intensas que impacta y engancha. El relato, se completa con pinceladas descriptivas del continente africano, de sus maravillosos paisajes de naturaleza virgen y fauna salvaje; de fiestas étnicas impregnadas de ritmos adictivos y de personajes singulares”.
//         ”¿Te has sentido alguna vez tan enganchado a una novela que no podías dejar de leerla? ¿Has sentido esa necesidad de seguir pasando las páginas para saber qué sucedía después? Eso me ocurrió con Arde África”.
//         Biografía de la autora
//         Nacida en Vitoria. Realizó estudios de Ciencias Económicas en las Universidades de Alcalá de Henares (Madrid) y la UNED. Reside en Guadalajara. Trabaja en su propio despacho profesional. Amante de la literatura, la fotografía, la música, la pintura y del cine, campos que abren puertas al conocimiento, las sensaciones, a la historia y a culturas diferentes.Concibe sus novelas de forma cinematográfica, destacan en ellas su dinamismo, la calidad de sus diálogos y una constante invitación a la reflexión.
//         En 2017 publicó Cicatrices de África , varias veces TOP1 DE DESCARGAS EN AMAZON ESPAÑA. Es la primera novela de la serie con el mismo nombre. El libro narra la trepidante historia de dos hermanos, Hugo y Yolanda, médicos cooperantes que trabajan en un centro sanitario africano involucrándose intensamente, y haciendo lo imposible por sacarlo adelante.');
//         $product->setFechaPublicacion(new \DateTime('2019-11-25'));
//         $product->setIdioma('Español');
//         $product->setDestacado(1);
//         $product->setPrecio(9.98);
//         $product->setActivo(1);
//         $product->setInicioDescuento(new \DateTime('0000-00-00'));
//         $product->setFinDescuento(new \DateTime('0000-00-00'));
//         $product->setDescuento(0);
//         $product->setTopVentas(0);

//         // tell Doctrine you want to (eventually) save the Product (no queries yet)
//         $entityManager->persist($product);

//         // actually executes the queries (i.e. the INSERT query)
//         $entityManager->flush();

$libro = $this->getDoctrine()
->getRepository(Libros::class)
->getLibroPortada(1);
// var_dump($libro);
        return $this->render('default/inicio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir') . '/..'),
            'locale' => $request->getLocale() ,
            'libro'=>$libro
        ]);
    }
    /**
     * @Route("/sobre_mi", name="sobreMi", defaults={"_locale"="es"}, requirements={"_locale"="%app.locales%"})
     * Route("/{_locale}/sobre_mi", name="sobreMi_locale", requirements={"_locale" = "%app.locales%"})
     */
    public function sobreMi(TranslatorInterface $translator): Response{
        return $this->render('default/sobremi.html.twig', [
            
        ]);
    }
}