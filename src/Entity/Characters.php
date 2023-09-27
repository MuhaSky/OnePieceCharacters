<?php

namespace App\Entity;

use App\Entity\Race;
use App\Repository\RaceRepository;
use App\Repository\CharactersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CharactersRepository::class)]
class Characters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min:3, max: 15)]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank]
    private ?string $groupSort = null;

    // #[ORM\Column(length: 255, nullable: true)]
    // private ?string $race = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagePath = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[Assert\NotBlank]
    private ?Race $races = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getGroupSort(): ?string
    {
        return $this->groupSort;
    }

    public function setGroupSort(?string $groupSort): static
    {
        $this->groupSort = $groupSort;

        return $this;
    }

    // public function getRace(): ?string
    // {
    //     return $this->race;
    // }

    // public function setRace(string $race): static
    // {
    //     $this->race = $race;

    //     return $this;
    // }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getRaces(): ?Race
    {
        return $this->races;
    }

    public function setRaces(?Race $races): static
    {
        $this->races = $races;

        return $this;
    }

}
