<?php

namespace App\Repository;

use App\Entity\Noticias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Noticias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Noticias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Noticias[]    findAll()
 * @method Noticias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Noticias::class);
    }

    // /**
    //  * @return Libros Returns a Libros objects
    //  */

    public function getNoticiaActiva($id)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT n
            FROM App\Entity\Noticias n
            WHERE n.id  = :id AND n.activa=1'
        )
            ->setParameter('id', $id)
            ->setMaxResults(1);

        return $query->getOneOrNullResult();
    }
    // /**
    //  * @return Libros Returns a Libros objects
    //  */

    public function getNoticiaAdmin($id)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT n
            FROM App\Entity\Noticias n
            WHERE n.id  = :id'
        )
            ->setParameter('id', $id)
            ->setMaxResults(1);

        return $query->getOneOrNullResult();
    }

    public function getNoticiaImportante()
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT n
            FROM App\Entity\Noticias n
            WHERE n.activa=1
            ORDER BY n.importancia DESC'
        )
            ->setMaxResults(1);

        return $query->getOneOrNullResult();
    }

    // /**
    //  * @return Libros[] Returns an array of Libros objects
    //  */

    public function getNoticiasActivas($limit = null)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT n
            FROM App\Entity\Noticias n
            WHERE n.activa=1
            ORDER BY n.fecha DESC'
        );
        if ($limit != null)
            $query
                ->setMaxResults($limit);;

        // returns an array of Product objects
        return $query->getResult();
    }
}
