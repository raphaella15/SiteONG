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
    private $activityTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityRapports;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityTitle(): ?string
    {
        return $this->activityTitle;
    }

    public function setActivityTitle(string $activityTitle): self
    {
        $this->activityTitle = $activityTitle;

        return $this;
    }

    public function getActivityRapports(): ?string
    {
        return $this->activityRapports;
    }

    public function setActivityRapports(string $activityRapports): self
    {
        $this->activityRapports = $activityRapports;

        return $this;
    }
}
