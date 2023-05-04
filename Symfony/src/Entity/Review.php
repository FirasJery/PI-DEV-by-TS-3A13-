<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ReviewRepository;


#[ORM\Entity(repositoryClass: ReviewRepository::class)]
#[ORM\Table(name: '`review`')]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length : 500)]
    private $message;

    #[ORM\Column(type : 'float')]
    private $note;

    #[ORM\Column(type : 'integer')]
    private $idEditeur;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $idUser = null;

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIdEditeur(): ?int
    {
        return $this->idEditeur;
    }

    public function setIdEditeur(int $idEditeur): self
    {
        $this->idEditeur = $idEditeur;

        return $this;
    }

   


}
