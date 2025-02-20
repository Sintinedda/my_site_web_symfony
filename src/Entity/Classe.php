<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $dv = null;

    #[ORM\Column(length: 255)]
    private ?string $armor = null;

    #[ORM\Column(length: 255)]
    private ?string $weapon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tool = null;

    #[ORM\Column(length: 255)]
    private ?string $save = null;

    #[ORM\Column(length: 255)]
    private ?string $competence = null;

    #[ORM\Column(length: 255)]
    private ?string $equipment1 = null;

    /**
     * @var Collection<int, ClasseByLevel>
     */
    #[ORM\OneToMany(targetEntity: ClasseByLevel::class, mappedBy: 'classe')]
    private Collection $classeByLevels;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipment2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipment3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipment4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipment5 = null;

    /**
     * @var Collection<int, Spell>
     */
    #[ORM\ManyToMany(targetEntity: Spell::class, mappedBy: 'classes')]
    private Collection $spells;

    public function __construct()
    {
        $this->classeByLevels = new ArrayCollection();
        $this->spells = new ArrayCollection();
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

    public function getDv(): ?int
    {
        return $this->dv;
    }

    public function setDv(int $dv): static
    {
        $this->dv = $dv;

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->armor;
    }

    public function setArmor(string $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function getWeapon(): ?string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): static
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getTool(): ?string
    {
        return $this->tool;
    }

    public function setTool(?string $tool): static
    {
        $this->tool = $tool;

        return $this;
    }

    public function getSave(): ?string
    {
        return $this->save;
    }

    public function setSave(string $save): static
    {
        $this->save = $save;

        return $this;
    }

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): static
    {
        $this->competence = $competence;

        return $this;
    }

    public function getEquipment1(): ?string
    {
        return $this->equipment1;
    }

    public function setEquipment1(string $equipment1): static
    {
        $this->equipment1 = $equipment1;

        return $this;
    }

    /**
     * @return Collection<int, ClasseByLevel>
     */
    public function getClasseByLevels(): Collection
    {
        return $this->classeByLevels;
    }

    public function addClasseByLevel(ClasseByLevel $classeByLevel): static
    {
        if (!$this->classeByLevels->contains($classeByLevel)) {
            $this->classeByLevels->add($classeByLevel);
            $classeByLevel->setClasse($this);
        }

        return $this;
    }

    public function removeClasseByLevel(ClasseByLevel $classeByLevel): static
    {
        if ($this->classeByLevels->removeElement($classeByLevel)) {
            // set the owning side to null (unless already changed)
            if ($classeByLevel->getClasse() === $this) {
                $classeByLevel->setClasse(null);
            }
        }

        return $this;
    }

    public function getEquipment2(): ?string
    {
        return $this->equipment2;
    }

    public function setEquipment2(?string $equipment2): static
    {
        $this->equipment2 = $equipment2;

        return $this;
    }

    public function getEquipment3(): ?string
    {
        return $this->equipment3;
    }

    public function setEquipment3(?string $equipment3): static
    {
        $this->equipment3 = $equipment3;

        return $this;
    }

    public function getEquipment4(): ?string
    {
        return $this->equipment4;
    }

    public function setEquipment4(?string $equipment4): static
    {
        $this->equipment4 = $equipment4;

        return $this;
    }

    public function getEquipment5(): ?string
    {
        return $this->equipment5;
    }

    public function setEquipment5(?string $equipment5): static
    {
        $this->equipment5 = $equipment5;

        return $this;
    }

    /**
     * @return Collection<int, Spell>
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): static
    {
        if (!$this->spells->contains($spell)) {
            $this->spells->add($spell);
            $spell->addClass($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): static
    {
        if ($this->spells->removeElement($spell)) {
            $spell->removeClass($this);
        }

        return $this;
    }
}
