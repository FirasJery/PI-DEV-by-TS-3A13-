<?php

namespace App\Entity;

use App\Repository\CertifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Exclude;


#[ORM\Entity(repositoryClass: CertifRepository::class)]
class Certif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Please enter the name of the certif')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The certif should be at least {{ limit }} characters', maxMessage: 'The certif cannot be longer than {{ limit }} characters')]
    private ?string $nom = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Please enter the description of the certif')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The description should be at least {{ limit }} characters', maxMessage: 'The description cannot be longer than {{ limit }} characters')]
    private ?string $descrip = null;

    #[ORM\Column(length: 500)]
    private ?string $badge = null;

    #[ORM\OneToMany(mappedBy: "certif", targetEntity: Test::class, orphanRemoval: true)]
    #[Exclude]
    private Collection $testId;



    public function __construct()
    {
        $this->tests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescrip(): ?string
    {
        return $this->descrip;
    }

    public function setDescrip(string $descrip): self
    {
        $this->descrip = $descrip;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(string $badge): self
    {
        $this->badge = $badge;

        return $this;
    }
    
    /**
     * @return Collection<int, Test>
     */
    public function getTestId(): Collection
    {
        return $this->testId;
    }

    public function addTests(Test $testId): self
    {
        if (!$this->testId->contains($testId)) {
            $this->testId->add($testId);
            $testId->setCertif($this);
        }

        return $this;
    }

    public function removeTestId(Test $testId): self
    {
        if ($this->testId->removeElement($testId)) {
            // set the owning side to null (unless already changed)
            if ($testId->getCertif() === $this) {
                $testId->setCertif(null);
            }
        }

        return $this;
    }
}
