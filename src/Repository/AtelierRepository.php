<?php

namespace App\Repository;

use App\Entity\Atelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Atelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Atelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Atelier[]    findAll()
 * @method Atelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Atelier::class);
    }


    //je déclare ma fonction getAteliersByCategorie
    // cette fonction va me permettre de récupérer tous les ateliers de la catégorie
    public function getAteliersByCategorie()
    {
        return $this->createQueryBuilder('ateliers')
            //Jointure entre les tables categorie et products
            // le leftjoin me permet de recupérer des produits sans catégorie (interet si on créer une barre de recherche)
            ->leftJoin('ateliers.categorie','cat')
            //rajoute des catégories à ma requête
            ->addSelect('cat')
            /*//Je récupère le libelleCat qui se situe dans ma table categorie pour le comparer à la variable passée en paramètre
            ->where('cat.LibelleCat LIKE :categorie')
            //SetParameter est une sécurité pour pouvoir utiliser la variable passé en paramètre
            ->setParameter('categorie', '%'.$libelle.'%')*/
            //getQuery me permet de récupérer la requete
            ->getQuery()
            // getArrayResult permet de recupérer le resultat dans un array
            ->getArrayResult();
    }





    // /**
    //  * @return Atelier[] Returns an array of Atelier objects
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
    public function findOneBySomeField($value): ?Atelier
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
