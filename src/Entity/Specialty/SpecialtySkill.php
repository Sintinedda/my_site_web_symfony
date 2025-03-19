<?php

namespace App\Entity\Specialty;

use App\Entity\Monster\SB;
use App\Repository\Specialty\SpecialtySkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, SpecialtyItem>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtyItem::class, inversedBy: 'specialtySkills')]
    private Collection $specialty;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr2 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr5 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr6 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr7 = null;

    #[ORM\Column]
    private ?int $lvl = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $part = null;

    #[ORM\OneToOne(mappedBy: 'skill', cascade: ['persist'])]
    private ?SB $monster = null;

    /**
     * @var Collection<int, SpecialtySkillTable>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtySkillTable::class, mappedBy: 'skills')]
    private Collection $tables;

    /**
     * @var Collection<int, SpecialtySkillList>
     */
    #[ORM\OneToMany(targetEntity: SpecialtySkillList::class, mappedBy: 'skill', orphanRemoval: true)]
    private Collection $lists;

    public function __construct()
    {
        $this->specialty = new ArrayCollection();
        $this->tables = new ArrayCollection();
        $this->lists = new ArrayCollection();
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

    public function setDescr1(string $descr1): static
    {
        $this->descr1 = $descr1;

        return $this;
    }

    /**
     * @return Collection<int, SpecialtyItem>
     */
    public function getSpecialty(): Collection
    {
        return $this->specialty;
    }

    public function setSpecialty(?SpecialtyItem $specialty): static
    {
        if (!$this->specialty->contains($specialty)) {
            $this->specialty->add($specialty);
        }

        return $this;
    }

    public function removeSpecialty(SpecialtyItem $specialty): static
    {
        $this->specialty->removeElement($specialty);

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

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): static
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(?string $part): static
    {
        $this->part = $part;

        return $this;
    }

    public function getMonster(): ?SB
    {
        return $this->monster;
    }

    public function setMonster(?SB $monster): static
    {
        // unset the owning side of the relation if necessary
        if ($monster === null && $this->monster !== null) {
            $this->monster->setSkill(null);
        }

        // set the owning side of the relation if necessary
        if ($monster !== null && $monster->getSkill() !== $this) {
            $monster->setSkill($this);
        }

        $this->monster = $monster;

        return $this;
    }

    /**
     * @return Collection<int, SpecialtySkillTable>
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(SpecialtySkillTable $table): static
    {
        if (!$this->tables->contains($table)) {
            $this->tables->add($table);
            $table->addSkill($this);
        }

        return $this;
    }

    public function removeTable(SpecialtySkillTable $table): static
    {
        if ($this->tables->removeElement($table)) {
            $table->removeSkill($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, SpecialtySkillList>
     */
    public function getLists(): Collection
    {
        return $this->lists;
    }

    public function addList(SpecialtySkillList $list): static
    {
        if (!$this->lists->contains($list)) {
            $this->lists->add($list);
            $list->setSkill($this);
        }

        return $this;
    }

    public function removeList(SpecialtySkillList $list): static
    {
        if ($this->lists->removeElement($list)) {
            // set the owning side to null (unless already changed)
            if ($list->getSkill() === $this) {
                $list->setSkill(null);
            }
        }

        return $this;
    }
}
