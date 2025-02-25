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

    #[ORM\Column(length: 255)]
    private ?string $icon = null;

    #[ORM\OneToOne(mappedBy: 'classe', cascade: ['persist', 'remove'])]
    private ?Specialty $specialty = null;

    #[ORM\OneToOne(mappedBy: 'classe', cascade: ['persist', 'remove'])]
    private ?Incantation $incantation = null;

    #[ORM\Column]
    private ?bool $rage = null;

    #[ORM\Column]
    private ?bool $damage = null;

    #[ORM\Column]
    private ?bool $cantrip = null;

    #[ORM\Column]
    private ?bool $knowing_spells = null;

    #[ORM\Column]
    private ?bool $spell = null;

    #[ORM\Column]
    private ?bool $sorcery_point = null;

    #[ORM\Column]
    private ?bool $martial_art = null;

    #[ORM\Column]
    private ?bool $ki = null;

    #[ORM\Column]
    private ?bool $movement_without_armor = null;

    #[ORM\Column]
    private ?bool $slot_space = null;

    #[ORM\Column]
    private ?bool $slot_level = null;

    #[ORM\Column]
    private ?bool $invocation_know = null;

    #[ORM\Column]
    private ?bool $sneak_attack = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr = null;

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

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(?Specialty $specialty): static
    {
        // unset the owning side of the relation if necessary
        if ($specialty === null && $this->specialty !== null) {
            $this->specialty->setClasse(null);
        }

        // set the owning side of the relation if necessary
        if ($specialty !== null && $specialty->getClasse() !== $this) {
            $specialty->setClasse($this);
        }

        $this->specialty = $specialty;

        return $this;
    }

    public function getIncantation(): ?Incantation
    {
        return $this->incantation;
    }

    public function setIncantation(Incantation $incantation): static
    {
        // set the owning side of the relation if necessary
        if ($incantation->getClasse() !== $this) {
            $incantation->setClasse($this);
        }

        $this->incantation = $incantation;

        return $this;
    }

    public function isRage(): ?bool
    {
        return $this->rage;
    }

    public function setRage(bool $rage): static
    {
        $this->rage = $rage;

        return $this;
    }

    public function isDamage(): ?bool
    {
        return $this->damage;
    }

    public function setDamage(bool $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function isCantrip(): ?bool
    {
        return $this->cantrip;
    }

    public function setCantrip(bool $cantrip): static
    {
        $this->cantrip = $cantrip;

        return $this;
    }

    public function isKnowingSpells(): ?bool
    {
        return $this->knowing_spells;
    }

    public function setKnowingSpells(bool $knowing_spells): static
    {
        $this->knowing_spells = $knowing_spells;

        return $this;
    }

    public function isSpell(): ?bool
    {
        return $this->spell;
    }

    public function setSpell(bool $spell): static
    {
        $this->spell = $spell;

        return $this;
    }

    public function isSorceryPoint(): ?bool
    {
        return $this->sorcery_point;
    }

    public function setSorceryPoint(bool $sorcery_point): static
    {
        $this->sorcery_point = $sorcery_point;

        return $this;
    }

    public function isMartialArt(): ?bool
    {
        return $this->martial_art;
    }

    public function setMartialArt(bool $martial_art): static
    {
        $this->martial_art = $martial_art;

        return $this;
    }

    public function isKi(): ?bool
    {
        return $this->ki;
    }

    public function setKi(bool $ki): static
    {
        $this->ki = $ki;

        return $this;
    }

    public function isMovementWithoutArmor(): ?bool
    {
        return $this->movement_without_armor;
    }

    public function setMovementWithoutArmor(bool $movement_without_armor): static
    {
        $this->movement_without_armor = $movement_without_armor;

        return $this;
    }

    public function isSlotSpace(): ?bool
    {
        return $this->slot_space;
    }

    public function setSlotSpace(bool $slot_space): static
    {
        $this->slot_space = $slot_space;

        return $this;
    }

    public function isSlotLevel(): ?bool
    {
        return $this->slot_level;
    }

    public function setSlotLevel(bool $slot_level): static
    {
        $this->slot_level = $slot_level;

        return $this;
    }

    public function isInvocationKnow(): ?bool
    {
        return $this->invocation_know;
    }

    public function setInvocationKnow(bool $invocation_know): static
    {
        $this->invocation_know = $invocation_know;

        return $this;
    }

    public function isSneakAttack(): ?bool
    {
        return $this->sneak_attack;
    }

    public function setSneakAttack(bool $sneak_attack): static
    {
        $this->sneak_attack = $sneak_attack;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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
}
