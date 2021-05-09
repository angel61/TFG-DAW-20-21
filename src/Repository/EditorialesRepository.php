<?php

namespace App\Repository;

use App\Entity\Editoriales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Editoriales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Editoriales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Editoriales[]    findAll()
 * @method Editoriales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditorialesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Editoriales::class);
    }

    // /**
    //  * @return Editoriales[] Returns an array of Editoriales objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Editoriales
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
