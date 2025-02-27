<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpellRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_NAME', fields: ['name_fr'])]
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
    private ?string $casting_time = null;

    #[ORM\Column(length: 255)]
    private ?string $range_effect = null;

    #[ORM\Column(length: 255)]
    private ?string $components = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $components_ingredients = null;

    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    #[ORM\Column(length: 1050)]
    private ?string $descr1 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $upper_level = null;

    #[ORM\Column(length: 255)]
    private ?string $source = null;

    #[ORM\Column]
    private ?bool $ritual = null;

    #[ORM\Column]
    private ?bool $concentration = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr2 = null;

    /**
     * @var Collection<int, Classe>
     */
    #[ORM\ManyToMany(targetEntity: Classe::class, inversedBy: 'spells')]
    private Collection $classes;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr5 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr6 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr7 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr8 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr9 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr10 = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'spells')]
    private ?SpellSchool $school = null;

    #[ORM\Column(length: 500)]
    private ?string $short_descr = null;

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

    public function getDescr1(): ?string
    {
        return $this->descr1;
    }

    public function setDescr1(string $descr1): static
    {
        $this->descr1 = $descr1;

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

    public function getDescr2(): ?string
    {
        return $this->descr2;
    }

    public function setDescr2(?string $descr2): static
    {
        $this->descr2 = $descr2;

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
        }

        return $this;
    }

    public function removeClass(Classe $class): static
    {
        $this->classes->removeElement($class);

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSchool(): ?SpellSchool
    {
        return $this->school;
    }

    public function setSchool(?SpellSchool $school): static
    {
        $this->school = $school;

        return $this;
    }

    public function getShortDescr(): ?string
    {
        return $this->short_descr;
    }

    public function setShortDescr(string $short_descr): static
    {
        $this->short_descr = $short_descr;

        return $this;
    }
}
