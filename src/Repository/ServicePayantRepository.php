<?php

namespace App\Repository;

use App\Entity\ServicePayant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicePayant>
 *
 * @method ServicePayant|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicePayant|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicePayant[]    findAll()
 * @method ServicePayant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicePayantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicePayant::class);
    }

//    /**
//     * @return ServicePayant[] Returns an array of ServicePayant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ServicePayant
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
