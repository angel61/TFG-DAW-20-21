<?php

namespace App\Repository;

use App\Entity\RedesSociales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RedesSociales|null find($id, $lockMode = null, $lockVersion = null)
 * @method RedesSociales|null findOneBy(array $criteria, array $orderBy = null)
 * @method RedesSociales[]    findAll()
 * @method RedesSociales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RedesSocialesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RedesSociales::class);
    }

    // /**
    //  * @return RedesSociales[] Returns an array of RedesSociales objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RedesSociales
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
