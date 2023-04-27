<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\ReponseRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
#[ORM\Table(name: '`reponse`')]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message : "veuillez entrez Une description ")]
    #[ORM\Column(length : 500)]
    private ?string $description=null;

   
    #[ORM\Column(type : 'integer')]
    private $idRec;

    #[ORM\Column(type : 'integer')]
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

   

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdRec(): ?int
    {
        return $this->idRec;
    }

    public function setIdRec(int $idRec): self
    {
        $this->idRec = $idRec;

        return $this;
    }


}
