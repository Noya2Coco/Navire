<?php

namespace App\Repository;

use App\Entity\AisShipType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AisShipType>
 *
 * @method AisShipType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AisShipType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AisShipType[]    findAll()
 * @method AisShipType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AisShipTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AisShipType::class);
    }
    
    public function findPortsCompatiblesByAisShipType(string $id): array {        
        $query = $this->createQueryBuilder('ast')
                ->select('p.indicatif as portIndicatif', 'p.nom as portNom', 'pay.nom as paysNom', 'n.id as navireId')
                ->innerJoin('ast.portsCompatibles', 'p')
                ->innerJoin('p.pays', 'pay')
                ->leftJoin('p.navires', 'n')
                ->where('ast.id = :aisShipTypeId')
                ->setParameter('aisShipTypeId', $id)
                ->getQuery();

        return $query->getResult();
    }

//    /**
//     * @return AisShipType[] Returns an array of AisShipType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AisShipType
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
