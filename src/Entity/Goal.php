<?php

namespace App\Entity;

use App\Repository\GoalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoalRepository::class)
 */
class Goal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $goalImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goalContent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoalImage(): ?string
    {
        return $this->goalImage;
    }

    public function setGoalImage(?string $goalImage): self
    {
        $this->goalImage = $goalImage;

        return $this;
    }

    public function getGoalContent(): ?string
    {
        return $this->goalContent;
    }

    public function setGoalContent(string $goalContent): self
    {
        $this->goalContent = $goalContent;

        return $this;
    }
}
