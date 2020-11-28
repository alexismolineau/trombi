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
     * @ORM\ManyToMany(targetEntity=Student::class, inversedBy="promotions")
     */
    private $Student;

    /**
     * @ORM\OneToMany(targetEntity=Links::class, mappedBy="promotion")
     */
    private $links;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    public function __construct()
    {
        $this->Student = new ArrayCollection();
        $this->links = new ArrayCollection();
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

    /**
     * @return Collection|Links[]
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }

    public function addLink(Links $link): self
    {
        if (!$this->links->contains($link)) {
            $this->links[] = $link;
            $link->setPromotion($this);
        }

        return $this;
    }

    public function removeLink(Links $link): self
    {
        if ($this->links->removeElement($link)) {
            // set the owning side to null (unless already changed)
            if ($link->getPromotion() === $this) {
                $link->setPromotion(null);
            }
        }

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
