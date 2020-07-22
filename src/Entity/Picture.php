<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 * @Vich\Uploadable
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @Vich\UploadableField(mapping="url_file", fileNameProperty="url")
     * @var File | null
     */
    private $urlFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="picture")
     */
    private $project;

    /**
     * @ORM\OneToOne(targetEntity=Tech::class, inversedBy="picture")
     */
    private $tech;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="picture")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getTech(): ?Tech
    {
        return $this->tech;
    }

    public function setTech(?Tech $tech): self
    {
        $this->tech = $tech;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function setUrlFile(File $picture = null):Picture
    {
        $this->urlFile = $picture;
        if ($picture) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getUrlFile(): ?File
    {
        return $this->urlFile;
    }
}
