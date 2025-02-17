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

    #[ORM\Column(length: 255)]
    private ?string $dv = null;

    /**
     * @var Collection<int, Spell>
     */
    #[ORM\ManyToMany(targetEntity: Spell::class, inversedBy: 'classes')]
    private Collection $spells;

    #[ORM\Column(length: 255)]
    private ?string $Armor = null;

    #[ORM\Column(length: 255)]
    private ?string $weapon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tool = null;

    #[ORM\Column(length: 255)]
    private ?string $save = null;

    #[ORM\Column(length: 255)]
    private ?string $competence = null;

    #[ORM\Column(length: 255)]
    private ?string $equipment = null;

    /**
     * @var Collection<int, ClasseByLevel>
     */
    #[ORM\OneToMany(targetEntity: ClasseByLevel::class, mappedBy: 'classe')]
    private Collection $classeByLevels;

    public function __construct()
    {
        $this->spells = new ArrayCollection();
        $this->classeByLevels = new ArrayCollection();
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

    public function getDv(): ?string
    {
        return $this->dv;
    }

    public function setDv(string $dv): static
    {
        $this->dv = $dv;

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
        }

        return $this;
    }

    public function removeSpell(Spell $spell): static
    {
        $this->spells->removeElement($spell);

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->Armor;
    }

    public function setArmor(string $Armor): static
    {
        $this->Armor = $Armor;

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

    public function getEquipment(): ?string
    {
        return $this->equipment;
    }

    public function setEquipment(string $equipment): static
    {
        $this->equipment = $equipment;

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
}
