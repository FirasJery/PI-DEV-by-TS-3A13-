<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter the question of the test')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The question should be at least {{ limit }} characters', maxMessage: 'The question cannot be longer than {{ limit }} characters')]
    private ?string $question = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter the reponse of the test')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'The reponse should be at least {{ limit }} characters', maxMessage: 'The reponse cannot be longer than {{ limit }} characters')]
    private ?string $reponse = null;

    #[ORM\ManyToOne(inversedBy: 'questId')]
    private ?Test $test = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;

        return $this;
    }
}
