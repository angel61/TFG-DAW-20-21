<?php

namespace App\Repository;

use App\Entity\Autores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Autores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autores[]    findAll()
 * @method Autores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autores::class);
    }

    // /**
    //  * @return Autores[] Returns an array of Autores objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Autores
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
