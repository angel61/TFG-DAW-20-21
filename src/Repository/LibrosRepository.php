<?php

namespace App\Repository;

use App\Entity\Libros;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Libros|null find($id, $lockMode = null, $lockVersion = null)
 * @method Libros|null findOneBy(array $criteria, array $orderBy = null)
 * @method Libros[]    findAll()
 * @method Libros[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibrosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Libros::class);
    }

    // /**
    //  * @return Libros[] Returns an array of Libros objects
    //  */
    
    public function getLibrosAutor($autor)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT l
            FROM App\Entity\Libros l
            WHERE l.autor  = :autor
            ORDER BY l.id ASC'
        )->setParameter('autor', $autor);

        // returns an array of Product objects
        return $query->getResult();
    }

    // /**
    //  * @return Libros Returns a Libros objects
    //  */
    
    public function getLibroPortada($autor)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT l
            FROM App\Entity\Libros l
            WHERE l.autor  = :autor
            ORDER BY l.fecha_publicacion DESC'
        )
        ->setParameter('autor', $autor)
        ->setMaxResults(1);

        return $query->getOneOrNullResult();
    }
   

    /*
    public function findOneBySomeField($value): ?Libros
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
