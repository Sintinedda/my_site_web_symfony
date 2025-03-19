<?php

namespace App\Repository\Spell;

use App\Data\SearchData;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Spell>
 */
class SpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Spell::class);
    }

    //    /**
    //     * @return Spell[] Returns an array of Spell objects
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

    //    public function findOneBySomeField($value): ?Spell
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findSearch(SearchData $search): array
    {
        $qb = $this->createQueryBuilder('s')
            ->select('cl', 'sc', 's', 'so')
            ->join('s.classes', 'cl')
            ->join('s.school', 'sc')
            ->join('s.source', 'so');

            if (!empty($search->min)) {
                $qb = $qb
                    ->andWhere('s.level >= :min')
                    ->setParameter('min', $search->min);
            }

            if (!empty($search->max)) {
                $qb = $qb
                    ->andWhere('s.level <= :max')
                    ->setParameter('max', $search->max);
            }

            if (!empty($search->classes)) {
                $qb = $qb
                    ->andWhere('cl.id IN (:classes)')
                    ->setParameter('classes', $search->classes);
            }

            if (!empty($search->schools)) {
                $qb = $qb
                    ->andWhere('sc.id IN (:schools)')
                    ->setParameter('schools', $search->schools);
            }

            if (!empty($search->sources)) {
                $qb = $qb
                    ->andWhere('so.name IN (:sources)')
                    ->setParameter('sources', $search->sources);
            }

            $query = $qb->getQuery();
            return $query->getResult();
    }
}
