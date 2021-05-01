<?php

namespace App\Repository;

use App\Entity\Reseausocial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reseausocial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reseausocial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reseausocial[]    findAll()
 * @method Reseausocial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReseausocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reseausocial::class);
    }

    // /**
    //  * @return Reseausocial[] Returns an array of Reseausocial objects
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
    public function findOneBySomeField($value): ?Reseausocial
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
