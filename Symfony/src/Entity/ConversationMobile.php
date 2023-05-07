<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

class ConversationMobile
{
    private $id;

    private $title;

    private $lastMessage;

    private $type;

    private $participants;

    public function __construct($id, $title, $type, $participants)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $ar = [];
        foreach($participants as $p){
            array_push($ar, $p->getUsername());
        }
        $this->participants = $ar;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($t){
        $this->title = $t;
    }

    public function getType() : ?string {
        return $this->type;
    }

    public function setType($t){
        $this->type = $t;
    }

    public function setParticipants($part){
        $ar = [];
        foreach($part as $p){
            array_push($ar, $p->getUser()->getUsername());
        }
        $this->participants = $ar;
    }

    public function getParticipants(){
        return $this->participants;
    }
}