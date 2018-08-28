<?php

namespace App\Repository;

use App\Entity\Gestoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gestoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gestoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gestoria[]    findAll()
 * @method Gestoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestoriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gestoria::class);
    }

//    /**
//     * @return Gestoria[] Returns an array of Gestoria objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gestoria
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
