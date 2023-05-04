<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Please enter the title of the test')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The title should be at least {{ limit }} characters', maxMessage: 'The title cannot be longer than {{ limit }} characters')]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Please enter the categorie of the test')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The categorie should be at least {{ limit }} characters', maxMessage: 'The categorie cannot be longer than {{ limit }} characters')]
    private ?string $categorie = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Please enter the description of the test')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The description should be at least {{ limit }} characters', maxMessage: 'The description cannot be longer than {{ limit }} characters')]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'testId')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Certif $certif = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: Question::class)]
    private Collection $questId;

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: Passage::class)]
    private Collection $passage;

    public function __construct()
    {
        $this->questId = new ArrayCollection();
        $this->passage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

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

    public function getCertif(): ?certif
    {
        return $this->certif;
    }

    public function setCertif(?certif $certif): self
    {
        $this->certif = $certif;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestId(): Collection
    {
        return $this->questId;
    }

    public function addQuestId(Question $questId): self
    {
        if (!$this->questId->contains($questId)) {
            $this->questId->add($questId);
            $questId->setTest($this);
        }

        return $this;
    }

    public function removeQuestId(Question $questId): self
    {
        if ($this->questId->removeElement($questId)) {
            // set the owning side to null (unless already changed)
            if ($questId->getTest() === $this) {
                $questId->setTest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Passage>
     */
    public function getPassage(): Collection
    {
        return $this->passage;
    }

    public function addPassage(Passage $passage): self
    {
        if (!$this->passage->contains($passage)) {
            $this->passage->add($passage);
            $passage->setTest($this);
        }

        return $this;
    }

    public function removePassage(Passage $passage): self
    {
        if ($this->passage->removeElement($passage)) {
            // set the owning side to null (unless already changed)
            if ($passage->getTest() === $this) {
                $passage->setTest(null);
            }
        }

        return $this;
    }
}
