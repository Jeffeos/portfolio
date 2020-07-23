<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="The subject cannot be empty")
     * @Assert\Length(max="255", maxMessage="The subject should not be more than {{ limit }} characters")
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="The email cannot be empty")
     * @Assert\Length(max="100", maxMessage="The email should not be more than {{ limit }} characters")
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $sendDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $messageRead = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        if ($email) {
            $this->sendDate = new DateTime('now');
        }

        return $this;
    }

    public function getSendDate(): ?\DateTimeInterface
    {
        return $this->sendDate;
    }

    public function setSendDate(\DateTimeInterface $sendDate): self
    {
        $this->sendDate = $sendDate;

        return $this;
    }

    public function getMessageRead(): ?bool
    {
        return $this->messageRead;
    }

    public function setMessageRead(bool $messageRead): self
    {
        $this->messageRead = $messageRead;

        return $this;
    }
}
