<?php

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Transaction>
 *
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transaction[]    findAll()
 * @method Transaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function save(Transaction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Transaction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Transaction[] Returns an array of Transaction objects
//     */
   public function Recieved($value): array
  {
        return $this->createQueryBuilder('t')
            ->andWhere('t.recWallet = :val')
            ->setParameter('val', $value)
            
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function Sent($value): array
    {
          return $this->createQueryBuilder('t')
              ->andWhere('t.sendingWallet = :val')
              ->setParameter('val', $value)
              
              ->setMaxResults(10)
              ->getQuery()
              ->getResult()
          ;
      }

      public function Recent($walletId): array
{
    

    return $this->createQueryBuilder('t')
        ->andwhere('t.sendingWallet = :walletId OR t.recWallet = :walletId')
        ->setParameter('walletId', $walletId)
        ->orderBy('t.date', 'DESC')
        ->setMaxResults(10)
              ->getQuery()
              ->getResult();

    
}

//    public function findOneBySomeField($value): ?Transaction
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
