<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "postulation")]
class Postulation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id_postulation", type: "integer")]
    private $idPostulation;

    #[ORM\Column(name: "isAccepted", type: "integer")]
    private $isaccepted;

    #[ORM\ManyToOne(targetEntity: "Utilisateur")]
    #[ORM\JoinColumn(name: "id_freelancer", referencedColumnName: "id")]
    private $idFreelancer;

    #[ORM\ManyToOne(inversedBy: 'postulations')]
    #[ORM\JoinColumn(name: "id_offre", referencedColumnName: "id_offre")]
    private ?Offre $idOffre = null;

    

    public function getIdPostulation(): ?int
    {
        return $this->idPostulation;
    }

    public function getIsaccepted(): ?int
    {
        return $this->isaccepted;
    }

    public function setIsaccepted(int $isaccepted): self
    {
        $this->isaccepted = $isaccepted;

        return $this;
    }

    public function getIdFreelancer(): ?Utilisateur
    {
        return $this->idFreelancer;
    }

    public function setIdFreelancer(?Utilisateur $idFreelancer): self
    {
        $this->idFreelancer = $idFreelancer;

        return $this;
    }

    public function getIdOffre(): ?Offre
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Offre $idOffre): self
    {
        $this->idOffre = $idOffre;

        return $this;
    }

   


}
