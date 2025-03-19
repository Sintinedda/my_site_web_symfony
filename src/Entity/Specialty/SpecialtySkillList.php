<?php

namespace App\Entity\Specialty;

use App\Repository\Specialty\SpecialtySkillListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialtySkillListRepository::class)]
class SpecialtySkillList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column]
    private ?int $place = null;

    #[ORM\Column(length: 600)]
    private ?string $l1 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $l2 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $l3 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $l4 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $l5 = null;

    #[ORM\ManyToOne(inversedBy: 'lists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SpecialtySkill $skill = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getL1(): ?string
    {
        return $this->l1;
    }

    public function setL1(string $l1): static
    {
        $this->l1 = $l1;

        return $this;
    }

    public function getL2(): ?string
    {
        return $this->l2;
    }

    public function setL2(?string $l2): static
    {
        $this->l2 = $l2;

        return $this;
    }

    public function getL3(): ?string
    {
        return $this->l3;
    }

    public function setL3(?string $l3): static
    {
        $this->l3 = $l3;

        return $this;
    }

    public function getL4(): ?string
    {
        return $this->l4;
    }

    public function setL4(?string $l4): static
    {
        $this->l4 = $l4;

        return $this;
    }

    public function getL5(): ?string
    {
        return $this->l5;
    }

    public function setL5(?string $l5): static
    {
        $this->l5 = $l5;

        return $this;
    }

    public function getSkill(): ?SpecialtySkill
    {
        return $this->skill;
    }

    public function setSkill(?SpecialtySkill $skill): static
    {
        $this->skill = $skill;

        return $this;
    }
}
