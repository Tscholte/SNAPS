<?php

namespace App\Repository;

use App\Entity\Klant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method Klant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Klant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Klant[]    findAll()
 * @method Klant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Klant::class);
    }

    public function getAllKlanten(){
        $query = $this->createQueryBuilder('cg')
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Klant[] Returns an array of Klant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Klant
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
