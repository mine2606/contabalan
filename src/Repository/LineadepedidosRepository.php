<?php

namespace App\Repository;

use App\Entity\Lineadepedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lineadepedidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lineadepedidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lineadepedidos[]    findAll()
 * @method Lineadepedidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineadepedidosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lineadepedidos::class);
    }

//    /**
//     * @return Lineadepedidos[] Returns an array of Lineadepedidos objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lineadepedidos
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
