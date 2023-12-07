<?php

namespace App\Repository;

use App\Entity\Gite;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gite>
 *
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }

    public function findBySearch(SearchData $searchData)
    {
        $gites = $this->createQueryBuilder('gite');
            // ->where('gite.ville LIKE :choice');

        if (!empty($searchData->choice)) {
            $gites = $gites
                ->andWhere('gite.ville LIKE :choice OR gite.nomGite LIKE :choice OR gite.departement LIKE :choice OR gite.cp LIKE :choice OR gite.region LIKE :choice')
                ->setParameter('choice', "%{$searchData->choice}%");
        }

        if (!empty($searchData->filtres)) {
            $gites = $gites
                ->join('gite.servicePayants', 'servicePayant')
                ->andWhere('servicePayant.id IN (:filtres)')
                ->setParameter('filtres', $searchData->filtres);
        }

        $gites = $gites
            ->getQuery()
            ->getResult();

        return $gites;
    }


    //    /**
    //     * @return Gite[] Returns an array of Gite objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Gite
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
