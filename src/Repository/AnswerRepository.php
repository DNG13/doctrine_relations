<?php

namespace App\Repository;

use App\Entity\Answer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Answer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Answer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Answer[]    findAll()
 * @method Answer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public static function crateApprovedCriteria(): Criteria
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()
                ->eq('status', Answer::STATUS_APPROVED));
    }

    /**
     * @return array Answer[]
     */
    public function findApproved(int $max = 10): array
    {
        return $this->createQueryBuilder('answer')
            ->addCriteria(self::crateApprovedCriteria())
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array Answer[]
     */
    public function findMostPopular(): array
    {
        return $this->createQueryBuilder('answer')
            ->addCriteria(self::crateApprovedCriteria())
            ->orderBy('answer.votes', 'desc')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
