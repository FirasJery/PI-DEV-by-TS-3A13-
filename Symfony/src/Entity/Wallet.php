<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WalletRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
#[ORM\Table(name: '`wallet`')]

class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[Assert\NotBlank(message : "veuillez entrez Un Nom valide")]
    #[ORM\Column(length : 200)]
    private ?string $nomWallet=null;

    #[ORM\Column(type : 'float')]
    private ?float $solde=null;

    #[ORM\Column(type : 'float')]
    private ?float $bonus=null;
    #[Assert\Length(
        exactMessage : "Le titre doit contenir exactement {{ limit }} caractères",
        min : 8,
        max : 8,
    )]
    #[ORM\Column(length : 200)]
    private $tel;

    #[ORM\Column]
    private ?int $idUser=null;

    #[ORM\Column(length : 10)]
    private ?string $cle=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomWallet(): ?string
    {
        return $this->nomWallet;
    }

    public function setNomWallet(string $nomWallet): self
    {
        $this->nomWallet = $nomWallet;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getBonus(): ?float
    {
        return $this->bonus;
    }

    public function setBonus(float $bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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

    public function getCle(): ?string
    {
        return $this->cle;
    }

    public function setCle(string $cle): self
    {
        $this->cle = $cle;

        return $this;
    }


}
