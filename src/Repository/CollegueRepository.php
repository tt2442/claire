<?php

namespace App\Repository;

use App\Entity\Collegue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Collegue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collegue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collegue[]    findAll()
 * @method Collegue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollegueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collegue::class);
    }

    // /**
    //  * @return Collegue[] Returns an array of Collegue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Collegue
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
