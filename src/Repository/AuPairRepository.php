<?php

namespace App\Repository;

use App\Entity\AuPair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method AuPair|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuPair|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuPair[]    findAll()
 * @method AuPair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuPairRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuPair::class);
    }

    public function getAll(){
        $query = $this->createQueryBuilder('cg')
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findById($value){
        $query = $this->createQueryBuilder('cg')
            ->andWhere('cg.id = :val')
            ->select('cg')
            ->setParameter('val', $value)
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findByRoom($value){
        $query = $this->createQueryBuilder('cg')
            ->andWhere('cg.room = :val')
            ->select('cg')
            ->setParameter('val', $value)
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return AuPair[] Returns an array of AuPair objects
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
    public function findOneBySomeField($value): ?AuPair
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
