<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private $projectTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ProjectRapports;

    /**
     * @ORM\Column(type="datetime")
     */
    private $projectDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $finished;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectTitle(): ?string
    {
        return $this->projectTitle;
    }

    public function setProjectTitle(string $projectTitle): self
    {
        $this->projectTitle = $projectTitle;

        return $this;
    }

    public function getProjectRapports(): ?string
    {
        return $this->ProjectRapports;
    }

    public function setProjectRapports(string $ProjectRapports): self
    {
        $this->ProjectRapports = $ProjectRapports;

        return $this;
    }

    public function getProjectDate(): ?\DateTimeInterface
    {
        return $this->projectDate;
    }

    public function setProjectDate(\DateTimeInterface $projectDate): self
    {
        $this->projectDate = $projectDate;

        return $this;
    }

    public function isFinished(): ?bool
    {
        return $this->finished;
    }

    public function setFinished(bool $finished): self
    {
        $this->finished = $finished;

        return $this;
    }
}
