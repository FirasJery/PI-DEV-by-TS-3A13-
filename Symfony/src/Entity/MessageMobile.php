<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

class MessageMobile
{
    private $id;

    private $content;

    private $participant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getParticipant()
    {
        return $this->participant;
    }

    public function setParticipant($participant): self
    {
        $this->participant = $participant;

        return $this;
    }
}
