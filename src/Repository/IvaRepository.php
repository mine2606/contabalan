<?php

namespace App\Repository;

use App\Entity\Iva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Iva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Iva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Iva[]    findAll()
 * @method Iva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IvaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Iva::class);
    }

//    /**
//     * @return Iva[] Returns an array of Iva objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Iva
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
