<?php

namespace App\Repository;

use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Room|null find($id, $lockMode = null, $lockVersion = null)
 * @method Room|null findOneBy(array $criteria, array $orderBy = null)
 * @method Room[]    findAll()
 * @method Room[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);
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
            ->setParameter('val', $value)
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findByKlant($klant){
        $query = $this->createQueryBuilder('cg')
            ->andWhere('cg.Klant = :val')
            ->setParameter('val', $klant)
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findByKlant2($klant){
        $z = "zoekopdracht";
        $query = $this->createQueryBuilder('cg')
            ->andWhere('cg.Klant = :val', 'cg.Status = :z')
            ->setParameter('val', $klant)
            ->setParameter('z', $z)
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }

    public function findByAuPair($AuPair){
        $query = $this->createQueryBuilder('cg')
            ->andWhere('cg.AuPair = :val')
            ->setParameter('val', $AuPair)
            ->select('cg')
            ->orderBy('cg.id', 'ASC');
        return $query->getQuery()->getResult();
    }


    // /**
    //  * @return Room[] Returns an array of Room objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Room
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
