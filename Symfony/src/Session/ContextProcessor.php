<?php

namespace App\Session;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\VarDumper\VarDumper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Utilisateur;
use App\Entity\Conversation;
use App\Repository\ConversationRepository;

class ContextProcessor extends AbstractController
{
    private $security;
    private $requestStack;
    private $entityManager;
    private $conversationRepository;

    public function __construct(
        Security $security, 
        RequestStack $rs, 
        EntityManagerInterface $entityManager,
        ConversationRepository $cr
        )
    {
        $this->security = $security;
        $this->requstStack = $rs;
        $this->entityManager = $entityManager;
        $this->conversationRepository = $cr;
    }

    public function current_user(){
        $session = $this->requstStack->getSession();
        if($this->getUser()){
            return $this->getUser();
        } else {
            return null;
        }
    }

    public function other_participant(Conversation $c){
        $session = $this->requstStack->getSession();
        if($this->getUser()){
            return $this->conversationRepository->getOtherParticipant($c, $this->getUser());
        } else {
            return null;
        }
    }

    public function your_participant(Conversation $c){
        $session = $this->requstStack->getSession();
        if($this->getUser()){
            return $this->conversationRepository->getYourParticipant($c, $this->getUser());
        } else {
            return null;
        }
    }

    public function getInfo(Conversation $c){
        $session = $this->requstStack->getSession();
        return $c->getType() . count($this->conversationRepository->getOtherParticipant($c, $this->getUser()));
    }
}
?>