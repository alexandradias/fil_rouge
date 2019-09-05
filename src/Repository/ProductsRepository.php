<?php

namespace App\Repository;

use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Products::class);
    }



    //je déclare ma fonction getProductsByCategorie
    // cette fonction va me permettre de récupérer
    // tous les produits d'une même catégorie
    public function getProductsByCategorie($libelle)
    {
        return $this->createQueryBuilder('products')
            //Jointure entre les tables categorie et products
            // le leftjoin me permet de recupérer des produits
            // sans catégorie (interet si on créer une barre de recherche)
            ->leftJoin('products.categoriesPdt','cat')
            //rajoute des catégories à ma requête
            ->addSelect('cat')
            //Je récupère le libelleCat qui se situe dans ma table categorie
            // pour le comparer à la variable passée en paramètre
            ->where('cat.LibelleCat LIKE :categorie')
            //SetParameter est une sécurité pour pouvoir
            // utiliser la variable passé en paramètre
            ->setParameter('categorie', '%'.$libelle.'%')
            //getQuery me permet de récupérer la requete
            ->getQuery()
            // getArrayResult permet de recupérer le resultat dans un array
            ->getArrayResult();
    }







    // /**
    //  * @return Products[] Returns an array of Products objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Products
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
