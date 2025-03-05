<?php

namespace App\Entity\Classe;

use App\Entity\Skill\Skill;
use App\Repository\Classe\ClasseByLevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseByLevelRepository::class)]
class ClasseByLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'classeByLevels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $bm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rage = null;

    #[ORM\Column(nullable: true)]
    private ?int $damage = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantrip = null;

    #[ORM\Column(nullable: true)]
    private ?int $knowing_spells = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_one = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_two = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_three = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_four = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_five = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_six = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_seven = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_eight = null;

    #[ORM\Column(nullable: true)]
    private ?int $spell_nine = null;

    #[ORM\Column(nullable: true)]
    private ?int $sorcery_point = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $martial_art = null;

    #[ORM\Column(nullable: true)]
    private ?int $ki = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $movement_without_armor = null;

    #[ORM\Column(nullable: true)]
    private ?int $slot_space = null;

    #[ORM\Column(nullable: true)]
    private ?int $slot_level = null;

    #[ORM\Column(nullable: true)]
    private ?int $invocation_know = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sneak_attack = null;

    /**
     * @var Collection<int, Skill>
     */
    #[ORM\ManyToMany(targetEntity: Skill::class, mappedBy: 'classe')]
    private Collection $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getBm(): ?int
    {
        return $this->bm;
    }

    public function setBm(int $bm): static
    {
        $this->bm = $bm;

        return $this;
    }

    public function getRage(): ?string
    {
        return $this->rage;
    }

    public function setRage(?string $rage): static
    {
        $this->rage = $rage;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(?int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getCantrip(): ?int
    {
        return $this->cantrip;
    }

    public function setCantrip(?int $cantrip): static
    {
        $this->cantrip = $cantrip;

        return $this;
    }

    public function getKnowingSpells(): ?int
    {
        return $this->knowing_spells;
    }

    public function setKnowingSpells(?int $knowing_spells): static
    {
        $this->knowing_spells = $knowing_spells;

        return $this;
    }

    public function getSpellOne(): ?int
    {
        return $this->spell_one;
    }

    public function setSpellOne(?int $spell_one): static
    {
        $this->spell_one = $spell_one;

        return $this;
    }

    public function getSpellTwo(): ?int
    {
        return $this->spell_two;
    }

    public function setSpellTwo(?int $spell_two): static
    {
        $this->spell_two = $spell_two;

        return $this;
    }

    public function getSpellThree(): ?int
    {
        return $this->spell_three;
    }

    public function setSpellThree(?int $spell_three): static
    {
        $this->spell_three = $spell_three;

        return $this;
    }

    public function getSpellFour(): ?int
    {
        return $this->spell_four;
    }

    public function setSpellFour(?int $spell_four): static
    {
        $this->spell_four = $spell_four;

        return $this;
    }

    public function getSpellFive(): ?int
    {
        return $this->spell_five;
    }

    public function setSpellFive(?int $spell_five): static
    {
        $this->spell_five = $spell_five;

        return $this;
    }

    public function getSpellSix(): ?int
    {
        return $this->spell_six;
    }

    public function setSpellSix(?int $spell_six): static
    {
        $this->spell_six = $spell_six;

        return $this;
    }

    public function getSpellSeven(): ?int
    {
        return $this->spell_seven;
    }

    public function setSpellSeven(?int $spell_seven): static
    {
        $this->spell_seven = $spell_seven;

        return $this;
    }

    public function getSpellEight(): ?int
    {
        return $this->spell_eight;
    }

    public function setSpellEight(?int $spell_eight): static
    {
        $this->spell_eight = $spell_eight;

        return $this;
    }

    public function getSpellNine(): ?int
    {
        return $this->spell_nine;
    }

    public function setSpellNine(?int $spell_nine): static
    {
        $this->spell_nine = $spell_nine;

        return $this;
    }

    public function getSorceryPoint(): ?int
    {
        return $this->sorcery_point;
    }

    public function setSorceryPoint(?int $sorcery_point): static
    {
        $this->sorcery_point = $sorcery_point;

        return $this;
    }

    public function getMartialArt(): ?string
    {
        return $this->martial_art;
    }

    public function setMartialArt(?string $martial_art): static
    {
        $this->martial_art = $martial_art;

        return $this;
    }

    public function getKi(): ?int
    {
        return $this->ki;
    }

    public function setKi(?int $ki): static
    {
        $this->ki = $ki;

        return $this;
    }

    public function getMovementWithoutArmor(): ?string
    {
        return $this->movement_without_armor;
    }

    public function setMovementWithoutArmor(?string $movement_without_armor): static
    {
        $this->movement_without_armor = $movement_without_armor;

        return $this;
    }

    public function getSlotSpace(): ?int
    {
        return $this->slot_space;
    }

    public function setSlotSpace(?int $slot_space): static
    {
        $this->slot_space = $slot_space;

        return $this;
    }

    public function getSlotLevel(): ?int
    {
        return $this->slot_level;
    }

    public function setSlotLevel(?int $slot_level): static
    {
        $this->slot_level = $slot_level;

        return $this;
    }

    public function getInvocationKnow(): ?int
    {
        return $this->invocation_know;
    }

    public function setInvocationKnow(?int $invocation_know): static
    {
        $this->invocation_know = $invocation_know;

        return $this;
    }

    public function getSneakAttack(): ?string
    {
        return $this->sneak_attack;
    }

    public function setSneakAttack(?string $sneak_attack): static
    {
        $this->sneak_attack = $sneak_attack;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->addClasse($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            $skill->removeClasse($this);
        }

        return $this;
    }
}
