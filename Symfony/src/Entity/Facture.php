<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FactureRepository;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
#[ORM\Table(name: '`facture`')]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'float')]
    private ?float $montantPaye=null;

    #[ORM\Column(type: 'integer')]
    private ?int $walletS=null;

    #[ORM\Column(length:250)]
    private ?string $certif=null;

    #[ORM\Column(type: 'integer')]
    private ?int $idUser=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantPaye(): ?float
    {
        return $this->montantPaye;
    }

    public function setMontantPaye(float $montantPaye): self
    {
        $this->montantPaye = $montantPaye;

        return $this;
    }

    public function getWalletS(): ?int
    {
        return $this->walletS;
    }

    public function setWalletS(int $walletS): self
    {
        $this->walletS = $walletS;

        return $this;
    }

    public function getCertif(): ?string
    {
        return $this->certif;
    }

    public function setCertif(string $certif): self
    {
        $this->certif = $certif;

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


}
