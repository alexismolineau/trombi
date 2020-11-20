<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mission;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgSrc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $film;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $livre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chanson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $application;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(?string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getImgSrc(): ?string
    {
        return $this->imgSrc;
    }

    public function setImgSrc(?string $imgSrc): self
    {
        $this->imgSrc = $imgSrc;

        return $this;
    }

    public function getFilm(): ?string
    {
        return $this->film;
    }

    public function setFilm(?string $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getJv(): ?string
    {
        return $this->jv;
    }

    public function setJv(?string $jv): self
    {
        $this->jv = $jv;

        return $this;
    }

    public function getHero(): ?string
    {
        return $this->hero;
    }

    public function setHero(?string $hero): self
    {
        $this->hero = $hero;

        return $this;
    }

    public function getLivre(): ?string
    {
        return $this->livre;
    }

    public function setLivre(?string $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    public function getChanson(): ?string
    {
        return $this->chanson;
    }

    public function setChanson(?string $chanson): self
    {
        $this->chanson = $chanson;

        return $this;
    }

    public function getApplication(): ?string
    {
        return $this->application;
    }

    public function setApplication(?string $application): self
    {
        $this->application = $application;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getLangage(): ?string
    {
        return $this->langage;
    }

    public function setLangage(?string $langage): self
    {
        $this->langage = $langage;

        return $this;
    }

    public function getSlack(): ?string
    {
        return $this->slack;
    }

    public function setSlack(string $slack): self
    {
        $this->slack = $slack;

        return $this;
    }
}
