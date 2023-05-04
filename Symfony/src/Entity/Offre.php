<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Table(name: "offre")]
#[ORM\Entity]
class Offre
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private $idOffre;

    #[ORM\Column(type: "string", length: 200)]
    #[Assert\NotBlank(message: "please add a title")]
    private $title;

    #[ORM\Column(type: "string", length: 500)]
    #[Assert\NotBlank(message: "please add a description")]
    private $description;

    #[ORM\Column(type: "string", length: 200)]
    #[Assert\NotBlank(message: "please add a category")]
    private $category;

    #[ORM\Column(type: "string", length: 200)]
    #[Assert\NotBlank(message: "please add a type")]
    private $type;

    #[ORM\Column(type: "integer")]
    #[Assert\NotNull]
    private $duree;

    #[ORM\Column(type: "boolean")]
    private $isaccepted;

    #[ORM\Column(type: "boolean")]
    private $isfinished;

    #[ORM\Column(type: "date")]
    #[Assert\NotNull]
    private $dateDebut;

    #[ORM\Column(type: "date")]
    #[Assert\NotNull]
    private $dateFin;

    #[ORM\ManyToOne(targetEntity: "Utilisateur")]
    #[ORM\JoinColumn(name: "id_entreprise", referencedColumnName: "id")]
    private $idEntreprise;

    #[ORM\OneToMany(mappedBy: 'idOffre', targetEntity: Postulation::class)]
    private Collection $postulations;

    public function __construct()
    {
        $this->postulations = new ArrayCollection();
    }


    public function getIdOffre(): ?int
    {
        return $this->idOffre;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function isIsaccepted(): ?bool
    {
        return $this->isaccepted;
    }

    public function setIsaccepted(bool $isaccepted): self
    {
        $this->isaccepted = $isaccepted;

        return $this;
    }

    public function isIsfinished(): ?bool
    {
        return $this->isfinished;
    }

    public function setIsfinished(bool $isfinished): self
    {
        $this->isfinished = $isfinished;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getIdEntreprise(): ?Utilisateur
    {
        return $this->idEntreprise;
    }

    public function setIdEntreprise(?Utilisateur $idEntreprise): self
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }
    public function __toString()
    {
        return $this->getTitle(); // or any other property or method that represents a string value
    }

    /**
     * @return Collection<int, Postulation>
     */
    public function getPostulations(): Collection
    {
        return $this->postulations;
    }

    public function addPostulation(Postulation $postulation): self
    {
        if (!$this->postulations->contains($postulation)) {
            $this->postulations->add($postulation);
            $postulation->setIdOffre($this);
        }

        return $this;
    }

    public function removePostulation(Postulation $postulation): self
    {
        if ($this->postulations->removeElement($postulation)) {
            // set the owning side to null (unless already changed)
            if ($postulation->getIdOffre() === $this) {
                $postulation->setIdOffre(null);
            }
        }

        return $this;
    }

}
