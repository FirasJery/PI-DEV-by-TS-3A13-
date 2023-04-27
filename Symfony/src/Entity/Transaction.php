<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransactionRepository;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ORM\Table(name: '`transaction`')]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private  $date=null;

    #[ORM\Column(type: 'float')]
    private ?float $montant=null;

    #[ORM\Column(type: 'integer')]
    private ?int $sendingWallet=null;

    #[ORM\Column(type: 'integer')]
    private ?int $recWallet=null;

    #[ORM\Column]
    private ?int $etat=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getSendingWallet(): ?int
    {
        return $this->sendingWallet;
    }

    public function setSendingWallet(int $sendingWallet): self
    {
        $this->sendingWallet = $sendingWallet;

        return $this;
    }

    public function getRecWallet(): ?int
    {
        return $this->recWallet;
    }

    public function setRecWallet(int $recWallet): self
    {
        $this->recWallet = $recWallet;

        return $this;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat): self
    {
        $this->etat = $etat;

        return $this;
    }


}
