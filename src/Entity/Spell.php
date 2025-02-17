<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpellRepository::class)]
class Spell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_fr = null;

    #[ORM\Column(length: 255)]
    private ?string $name_eng = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(length: 255)]
    private ?string $school = null;

    #[ORM\Column(length: 255)]
    private ?string $casting_time = null;

    #[ORM\Column(length: 255)]
    private ?string $range_effect = null;

    #[ORM\Column(length: 255)]
    private ?string $components = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $components_ingredients = null;

    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $upper_level = null;

    #[ORM\Column(length: 255)]
    private ?string $source = null;

    #[ORM\Column]
    private ?bool $ritual = null;

    #[ORM\Column]
    private ?bool $concentration = null;

    /**
     * @var Collection<int, Classe>
     */
    #[ORM\ManyToMany(targetEntity: Classe::class, mappedBy: 'spells')]
    private Collection $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): static
    {
        $this->school = $school;

        return $this;
    }

    public function getCastingTime(): ?string
    {
        return $this->casting_time;
    }

    public function setCastingTime(string $casting_time): static
    {
        $this->casting_time = $casting_time;

        return $this;
    }

    public function getRangeEffect(): ?string
    {
        return $this->range_effect;
    }

    public function setRangeEffect(string $range_effect): static
    {
        $this->range_effect = $range_effect;

        return $this;
    }

    public function getComponents(): ?string
    {
        return $this->components;
    }

    public function setComponents(string $components): static
    {
        $this->components = $components;

        return $this;
    }

    public function getComponentsIngredients(): ?string
    {
        return $this->components_ingredients;
    }

    public function setComponentsIngredients(?string $components_ingredients): static
    {
        $this->components_ingredients = $components_ingredients;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUpperLevel(): ?string
    {
        return $this->upper_level;
    }

    public function setUpperLevel(?string $upper_level): static
    {
        $this->upper_level = $upper_level;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function isRitual(): ?bool
    {
        return $this->ritual;
    }

    public function setRitual(bool $ritual): static
    {
        $this->ritual = $ritual;

        return $this;
    }

    public function isConcentration(): ?bool
    {
        return $this->concentration;
    }

    public function setConcentration(bool $concentration): static
    {
        $this->concentration = $concentration;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->addSpell($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): static
    {
        if ($this->classes->removeElement($class)) {
            $class->removeSpell($this);
        }

        return $this;
    }
}
