<?php

namespace App\Entity\StatBlock;

use App\Entity\Specialty\SpecialtySkill;
use App\Repository\StatBlock\StatBlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatBlockRepository::class)]
class StatBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_fr = null;

    #[ORM\Column(length: 255)]
    private ?string $name_eng = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alignement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $armor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pv = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $speed = null;

    #[ORM\Column]
    private ?int $strenght = null;

    #[ORM\Column]
    private ?int $dexterity = null;

    #[ORM\Column]
    private ?int $constitution = null;

    #[ORM\Column]
    private ?int $intelligence = null;

    #[ORM\Column]
    private ?int $wisdow = null;

    #[ORM\Column]
    private ?int $charisma = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sens = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immunity_damage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immunity_condition = null;

    /**
     * @var Collection<int, StatBlockSkill>
     */
    #[ORM\OneToMany(targetEntity: StatBlockSkill::class, mappedBy: 'statblock')]
    private Collection $statBlockSkills;

    /**
     * @var Collection<int, StatBlockAction>
     */
    #[ORM\OneToMany(targetEntity: StatBlockAction::class, mappedBy: 'StatBlock')]
    private Collection $statBlockActions;

    #[ORM\OneToOne(inversedBy: 'statBlock', cascade: ['persist', 'remove'])]
    private ?SpecialtySkill $specialty_skill = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $save = null;

    /**
     * @var Collection<int, StatBlockReaction>
     */
    #[ORM\OneToMany(targetEntity: StatBlockReaction::class, mappedBy: 'statblock')]
    private Collection $statBlockReactions;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->statBlockSkills = new ArrayCollection();
        $this->statBlockActions = new ArrayCollection();
        $this->statBlockReactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFr(): ?string
    {
        return $this->name_fr;
    }

    public function setNameFr(string $name_fr): static
    {
        $this->name_fr = $name_fr;

        return $this;
    }

    public function getNameEng(): ?string
    {
        return $this->name_eng;
    }

    public function setNameEng(string $name_eng): static
    {
        $this->name_eng = $name_eng;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getAlignement(): ?string
    {
        return $this->alignement;
    }

    public function setAlignement(?string $alignement): static
    {
        $this->alignement = $alignement;

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->armor;
    }

    public function setArmor(?string $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function getPv(): ?string
    {
        return $this->pv;
    }

    public function setPv(?string $pv): static
    {
        $this->pv = $pv;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(?string $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getStrenght(): ?int
    {
        return $this->strenght;
    }

    public function setStrenght(int $strenght): static
    {
        $this->strenght = $strenght;

        return $this;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): static
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): static
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): static
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getWisdow(): ?int
    {
        return $this->wisdow;
    }

    public function setWisdow(int $wisdow): static
    {
        $this->wisdow = $wisdow;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): static
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(?string $competence): static
    {
        $this->competence = $competence;

        return $this;
    }

    public function getSens(): ?string
    {
        return $this->sens;
    }

    public function setSens(?string $sens): static
    {
        $this->sens = $sens;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getFp(): ?string
    {
        return $this->fp;
    }

    public function setFp(?string $fp): static
    {
        $this->fp = $fp;

        return $this;
    }

    public function getBm(): ?string
    {
        return $this->bm;
    }

    public function setBm(?string $bm): static
    {
        $this->bm = $bm;

        return $this;
    }

    public function getImmunityDamage(): ?string
    {
        return $this->immunity_damage;
    }

    public function setImmunityDamage(?string $immunity_damage): static
    {
        $this->immunity_damage = $immunity_damage;

        return $this;
    }

    public function getImmunityCondition(): ?string
    {
        return $this->immunity_condition;
    }

    public function setImmunityCondition(?string $immunity_condition): static
    {
        $this->immunity_condition = $immunity_condition;

        return $this;
    }

    /**
     * @return Collection<int, StatBlockSkill>
     */
    public function getStatBlockSkills(): Collection
    {
        return $this->statBlockSkills;
    }

    public function addStatBlockSkill(StatBlockSkill $statBlockSkill): static
    {
        if (!$this->statBlockSkills->contains($statBlockSkill)) {
            $this->statBlockSkills->add($statBlockSkill);
            $statBlockSkill->setStatblock($this);
        }

        return $this;
    }

    public function removeStatBlockSkill(StatBlockSkill $statBlockSkill): static
    {
        if ($this->statBlockSkills->removeElement($statBlockSkill)) {
            // set the owning side to null (unless already changed)
            if ($statBlockSkill->getStatblock() === $this) {
                $statBlockSkill->setStatblock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StatBlockAction>
     */
    public function getStatBlockActions(): Collection
    {
        return $this->statBlockActions;
    }

    public function addStatBlockAction(StatBlockAction $statBlockAction): static
    {
        if (!$this->statBlockActions->contains($statBlockAction)) {
            $this->statBlockActions->add($statBlockAction);
            $statBlockAction->setStatBlock($this);
        }

        return $this;
    }

    public function removeStatBlockAction(StatBlockAction $statBlockAction): static
    {
        if ($this->statBlockActions->removeElement($statBlockAction)) {
            // set the owning side to null (unless already changed)
            if ($statBlockAction->getStatBlock() === $this) {
                $statBlockAction->setStatBlock(null);
            }
        }

        return $this;
    }

    public function getSpecialtySkill(): ?SpecialtySkill
    {
        return $this->specialty_skill;
    }

    public function setSpecialtySkill(?SpecialtySkill $specialty_skill): static
    {
        $this->specialty_skill = $specialty_skill;

        return $this;
    }

    public function getSave(): ?string
    {
        return $this->save;
    }

    public function setSave(?string $save): static
    {
        $this->save = $save;

        return $this;
    }

    /**
     * @return Collection<int, StatBlockReaction>
     */
    public function getStatBlockReactions(): Collection
    {
        return $this->statBlockReactions;
    }

    public function addStatBlockReaction(StatBlockReaction $statBlockReaction): static
    {
        if (!$this->statBlockReactions->contains($statBlockReaction)) {
            $this->statBlockReactions->add($statBlockReaction);
            $statBlockReaction->setStatblock($this);
        }

        return $this;
    }

    public function removeStatBlockReaction(StatBlockReaction $statBlockReaction): static
    {
        if ($this->statBlockReactions->removeElement($statBlockReaction)) {
            // set the owning side to null (unless already changed)
            if ($statBlockReaction->getStatblock() === $this) {
                $statBlockReaction->setStatblock(null);
            }
        }

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
}
