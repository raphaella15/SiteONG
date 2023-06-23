<?php

namespace App\Entity;

use App\Repository\VisionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisionRepository::class)
 */
class Vision
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
    private $detailsOfVision;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailsOfVision(): ?string
    {
        return $this->detailsOfVision;
    }

    public function setDetailsOfVision(string $detailsOfVision): self
    {
        $this->detailsOfVision = $detailsOfVision;

        return $this;
    }
}
