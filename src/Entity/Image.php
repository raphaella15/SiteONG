<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImageTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImageContent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageTitle(): ?string
    {
        return $this->ImageTitle;
    }

    public function setImageTitle(string $ImageTitle): self
    {
        $this->ImageTitle = $ImageTitle;

        return $this;
    }

    public function getImageContent(): ?string
    {
        return $this->ImageContent;
    }

    public function setImageContent(string $ImageContent): self
    {
        $this->ImageContent = $ImageContent;

        return $this;
    }
}
