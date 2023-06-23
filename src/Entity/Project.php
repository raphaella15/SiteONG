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
    private $ProjectDetails;

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

    public function getProjectDetails(): ?string
    {
        return $this->ProjectDetails;
    }

    public function setProjectDetails(string $ProjectDetails): self
    {
        $this->ProjectDetails = $ProjectDetails;

        return $this;
    }
}
