<?php

namespace App\Entity;

use App\Repository\MsgRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MsgRepository::class)
 */
class Msg
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="msgs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_sender;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="recieve")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_reciever;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSender(): ?User
    {
        return $this->id_sender;
    }

    public function setIdSender(?User $id_sender): self
    {
        $this->id_sender = $id_sender;

        return $this;
    }

    public function getIdReciever(): ?User
    {
        return $this->id_reciever;
    }

    public function setIdReciever(?User $id_reciever): self
    {
        $this->id_reciever = $id_reciever;

        return $this;
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
}
