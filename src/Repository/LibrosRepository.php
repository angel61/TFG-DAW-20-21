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
    
    public function getLibros()
    {
        return $this->createQueryBuilder('l')
        ->where('autor = 1')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
