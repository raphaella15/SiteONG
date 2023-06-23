<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
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
    private $activityName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityDetails;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->activityName;
    }

    public function setActivityName(string $activityName): self
    {
        $this->activityName = $activityName;

        return $this;
    }

    public function getActivityDetails(): ?string
    {
        return $this->activityDetails;
    }

    public function setActivityDetails(string $activityDetails): self
    {
        $this->activityDetails = $activityDetails;

        return $this;
    }
}
