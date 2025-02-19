<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 2040, nullable: true)]
    private ?string $descr1 = null;

    /**
     * @var Collection<int, ClasseByLevel>
     */
    #[ORM\ManyToMany(targetEntity: ClasseByLevel::class, inversedBy: 'skills')]
    private Collection $classe;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr2 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr5 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr6 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr7 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr8 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr9 = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descr10 = null;

    public function __construct()
    {
        $this->classe = new ArrayCollection();
    }

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

    public function setDescr1(?string $descr1): static
    {
        $this->descr1 = $descr1;

        return $this;
    }

    /**
     * @return Collection<int, ClasseByLevel>
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(ClasseByLevel $classe): static
    {
        if (!$this->classe->contains($classe)) {
            $this->classe->add($classe);
        }

        return $this;
    }

    public function removeClasse(ClasseByLevel $classe): static
    {
        $this->classe->removeElement($classe);

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

    public function getDescr6(): ?string
    {
        return $this->descr6;
    }

    public function setDescr6(?string $descr6): static
    {
        $this->descr6 = $descr6;

        return $this;
    }

    public function getDescr7(): ?string
    {
        return $this->descr7;
    }

    public function setDescr7(?string $descr7): static
    {
        $this->descr7 = $descr7;

        return $this;
    }

    public function getDescr8(): ?string
    {
        return $this->descr8;
    }

    public function setDescr8(?string $descr8): static
    {
        $this->descr8 = $descr8;

        return $this;
    }

    public function getDescr9(): ?string
    {
        return $this->descr9;
    }

    public function setDescr9(?string $descr9): static
    {
        $this->descr9 = $descr9;

        return $this;
    }

    public function getDescr10(): ?string
    {
        return $this->descr10;
    }

    public function setDescr10(?string $descr10): static
    {
        $this->descr10 = $descr10;

        return $this;
    }
}
