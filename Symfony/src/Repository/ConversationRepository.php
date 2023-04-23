<?php

namespace App\Repository;

use App\Entity\Conversation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\User;
use App\Entity\Participant;

/**
 * @extends ServiceEntityRepository<Conversation>
 *
 * @method Conversation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conversation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conversation[]    findAll()
 * @method Conversation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConversationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conversation::class);
    }

    public function add(Conversation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Conversation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /*public function findConvo(Participant $u, Participant $p){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c')
        ->from('App\Entity\Conversation', 'c')
        ->join('c.participants', 'p1', 'WITH', 'p1 = :user')
        ->join('c.participants', 'p2', 'WITH', 'p2 = :other')
        //->where('p1 = :user')
        //->andWhere('p2 = :other')
        ->setParameters(["user" => $u, "other" => $p]);

        return $qb->getQuery()->getResult();
        return findConvo2($u->getId(), $p->getId());
    }

    public function findConvo2(int $u, int $o){
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQueryBuilder()
        ->select('c')
        ->from('App\Entity\Conversation', 'c')
        ->join('c.participants', 'p1')
        ->join('c.participants', 'p2')
        ->where('p1.id = :participant1')
        ->andWhere('p2.id = :participant2')
        ->setParameter('participant1', $u)
        ->setParameter('participant2', $o)
        ->getQuery();

        //$form->get("my_field")->getData();

        return $query->getResult();
    }*/

    public function findConversationByUsers($users){
        $size = count($users);
        $c = $this->findAll();
        foreach($c as $s){
            $i = 0;
            if(($s->getType() == "grp") && ($size <= 2)){
                continue;
            }
            if (($s->getType() == "p2p") && ($size > 2)) {
                continue;
            }
            foreach($s->getParticipants() as $part){
                for($j = 0; $j < $size; $j++){
                    if($part->getUser()->getId() == $users[$j]){
                        $i = $i + 1;
                    }
                }
            }
            if($i == $size){
                return $s;
            }
        }

        return null;
    }

    public function getOtherParticipant(Conversation $c, User $u){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('con')
        ->from('App\Entity\Participant', 'con')
        ->join('App\Entity\Conversation', 'c', 'WITH', 'con.conversation = c')
        ->where('c = :convo')
        //->andWhere('con.id != :current_id')
        ->setParameters(['convo' => $c]);// 'current_id' => $u->getId()]);
        $part = $qb->getQuery()->getResult();
        $filtered = [];
        foreach($part as $p){   
            if($p->getUser()->getId() != $u->getId()){
                array_push($filtered, $p->getUser());
            }
        }
        return $filtered;
    }

    public function getYourParticipant(Conversation $c, User $u){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('con')
        ->from('App\Entity\Participant', 'con')
        ->join('App\Entity\Conversation', 'c', 'WITH', 'con.conversation = c')
        ->where('c = :convo')
        //->andWhere('con.id != :current_id')
        ->setParameters(['convo' => $c]);// 'current_id' => $u->getId()]);
        $part = $qb->getQuery()->getResult();
        foreach($part as $p){   
            if($p->getUser()->getId() == $u->getId()){
                return $p->getUser();
            }
        }
        return null;
    }

//    /**
//     * @return Conversation[] Returns an array of Conversation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Conversation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
