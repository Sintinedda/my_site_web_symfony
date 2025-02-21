<?php

namespace App\Entity;

use App\Repository\SpecialtySkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialtySkillRepository::class)]
class SpecialtySkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr1 = null;

    #[ORM\ManyToOne(inversedBy: 'specialtySkills')]
    private ?SpecialtyItem $specialty = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr2 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr5 = null;

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

    public function getDescr1(): ?string
    {
        return $this->descr1;
    }

    public function setDescr1(string $descr1): static
    {
        $this->descr1 = $descr1;

        return $this;
    }

    public function getSpecialty(): ?SpecialtyItem
    {
        return $this->specialty;
    }

    public function setSpecialty(?SpecialtyItem $specialty): static
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getDescr2(): ?string
    {
        return $this->descr2;
    }

    public function setDescr2(?string $descr2): static
    {
        $this->descr2 = $descr2;

        return $this;
    }

    public function getDescr3(): ?string
    {
        return $this->descr3;
    }

    public function setDescr3(?string $descr3): static
    {
        $this->descr3 = $descr3;

        return $this;
    }

    public function getDescr4(): ?string
    {
        return $this->descr4;
    }

    public function setDescr4(?string $descr4): static
    {
        $this->descr4 = $descr4;

        return $this;
    }

    public function getDescr5(): ?string
    {
        return $this->descr5;
    }

    public function setDescr5(?string $descr5): static
    {
        $this->descr5 = $descr5;

        return $this;
    }
}
