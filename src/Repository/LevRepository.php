<?php

namespace App\Repository;

use App\Entity\Lev;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lev|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lev|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lev[]    findAll()
 * @method Lev[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LevRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lev::class);
    }

    // /**
    //  * @return Lev[] Returns an array of Lev objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lev
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
