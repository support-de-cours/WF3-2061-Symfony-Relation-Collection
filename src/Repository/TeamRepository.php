<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Team>
 *
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Team::class);
    }

    public function save(Team $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Team $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function teamAlphabetical()
    {
        return $this->createQueryBuilder('t1') // t1 = alias de la table "team"
            ->orderBy('t1.name', 'ASC')
            ->getQuery()
            ->execute()
        ;
    }

//    /**
//     * @return Team[] Returns an array of Team objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t') // SELECT * FORM `team`
//            ->andWhere('t.exampleField = :val') // WHERE `exampleField`=$value
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC') // ORDER BY `id` ASC
//            ->setMaxResults(10) // LIMIT 0,10
//            ->getQuery()
//            ->getResult()
//        ;
//          SELECT * FORM `team` WHERE `exampleField`=$value ORDER BY `id` ASC LIMIT 0,10
//    }

//    public function findOneBySomeField($value): ?Team
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
