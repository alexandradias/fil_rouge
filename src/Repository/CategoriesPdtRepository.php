<?php

namespace App\Repository;

use App\Entity\CategoriesPdt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoriesPdt|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesPdt|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesPdt[]    findAll()
 * @method CategoriesPdt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesPdtRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoriesPdt::class);
    }

    // /**
    //  * @return CategoriesPdt[] Returns an array of CategoriesPdt objects
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
    public function findOneBySomeField($value): ?CategoriesPdt
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
