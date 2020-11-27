<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
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
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupPicture;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $courseLinks = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slackLink;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $googleDriveLink = [];

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, inversedBy="promotions")
     */
    private $Student;

    public function __construct()
    {
        $this->Student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGroupPicture(): ?string
    {
        return $this->groupPicture;
    }

    public function setGroupPicture(?string $groupPicture): self
    {
        $this->groupPicture = $groupPicture;

        return $this;
    }

    public function getCourseLinks(): ?array
    {
        return $this->courseLinks;
    }

    public function setCourseLinks(?array $courseLinks): self
    {
        $this->courseLinks = $courseLinks;

        return $this;
    }

    public function getSlackLink(): ?string
    {
        return $this->slackLink;
    }

    public function setSlackLink(?string $slackLink): self
    {
        $this->slackLink = $slackLink;

        return $this;
    }

    public function getGoogleDriveLink(): ?array
    {
        return $this->googleDriveLink;
    }

    public function setGoogleDriveLink(?array $googleDriveLink): self
    {
        $this->googleDriveLink = $googleDriveLink;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudent(): Collection
    {
        return $this->Student;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->Student->contains($student)) {
            $this->Student[] = $student;
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        $this->Student->removeElement($student);

        return $this;
    }
}
