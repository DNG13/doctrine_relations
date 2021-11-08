<?php

namespace App\Repository;

use App\Entity\Anwer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Anwer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anwer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anwer[]    findAll()
 * @method Anwer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnwerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anwer::class);
    }

    // /**
    //  * @return Anwer[] Returns an array of Anwer objects
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
    public function findOneBySomeField($value): ?Anwer
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
