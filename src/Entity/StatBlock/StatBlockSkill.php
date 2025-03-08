<?php

namespace App\Entity\StatBlock;

use App\Repository\StatBlock\StatBlockSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatBlockSkillRepository::class)]
class StatBlockSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr = null;

    #[ORM\ManyToOne(inversedBy: 'statBlockSkills')]
    private ?StatBlock $statblock = null;

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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): static
    {
        $this->descr = $descr;

        return $this;
    }

    public function getStatblock(): ?StatBlock
    {
        return $this->statblock;
    }

    public function setStatblock(?StatBlock $statblock): static
    {
        $this->statblock = $statblock;

        return $this;
    }
}
