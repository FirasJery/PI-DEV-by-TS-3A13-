<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

#[ORM\Entity(repositoryClass: ConversationRepository::class)]
#[ORM\Table(indexes: [
    #ORM\Index(name: "last_message_id_index", columns: ["last_message_id"])
])]
class Conversation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type:"integer")]
    private $id;

    #[ORM\OneToMany(targetEntity:"Participant", mappedBy:"conversation", cascade:["persist"])]
    private $participants;

    #[ORM\Column(type:"string", length:255)]
    private $title;

    #[ORM\OneToOne(targetEntity:"Message")]
    #[ORM\JoinColumn(name:"last_message_id", referencedColumnName:"id")]
    private $lastMessage;

    #[ORM\OneToMany(targetEntity:"Message", mappedBy:"conversation")]
    private $messages;

    #[ORM\Column(type:"string", length:50)]
    private $type;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setConversation($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->removeElement($participant)) {
            // set the owning side to null (unless already changed)
            if ($participant->getConversation() === $this) {
                $participant->setConversation(null);
            }
        }

        return $this;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($t){
        $this->title = $t;
    }

    public function getLastMessage(): ?Message
    {
        return $this->lastMessage;
    }

    public function getLastMessageStr(){
        return $this->lastMessage->getContent();
    }

    public function setLastMessage(?Message $lastMessage): self
    {
        $this->lastMessage = $lastMessage;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function getType() : ?string {
        return $this->type;
    }

    public function setType($t){
        $this->type = $t;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setConversation($this);
            $this->setLastMessage($message);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getConversation() === $this) {
                $message->setConversation(null);
            }
        }

        return $this;
    }
}
