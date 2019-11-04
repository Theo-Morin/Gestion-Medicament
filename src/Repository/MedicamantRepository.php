<?php

namespace App\Repository;

use App\Entity\Medicamant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Medicamant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicamant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicamant[]    findAll()
 * @method Medicamant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicamantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medicamant::class);
    }

    // /**
    //  * @return Medicamant[] Returns an array of Medicamant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medicamant
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
