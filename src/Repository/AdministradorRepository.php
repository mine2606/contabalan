<?php

namespace App\Repository;

use App\Entity\Administrador;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Administrador|null find($id, $lockMode = null, $lockVersion = null)
 * @method Administrador|null findOneBy(array $criteria, array $orderBy = null)
 * @method Administrador[]    findAll()
 * @method Administrador[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdministradorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Administrador::class);
    }

//    /**
//     * @return Administrador[] Returns an array of Administrador objects
//     */
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
    public function findOneBySomeField($value): ?Administrador
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
