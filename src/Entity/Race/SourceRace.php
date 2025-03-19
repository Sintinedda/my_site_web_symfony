<?php

namespace App\Entity\Race;

use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Entity\Talent\Talent;
use App\Repository\Race\SourceRaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SourceRaceRepository::class)]
class SourceRace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sourceRaces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;
    
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr1 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr2 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $descr5 = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $ability_inc = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $age = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $alignment = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $size = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $speed = null;

    #[ORM\Column(length: 1050, nullable: true)]
    private ?string $language = null;

    /**
     * @var Collection<int, Subrace>
     */
    #[ORM\OneToMany(targetEntity: Subrace::class, mappedBy: 'source')]
    private Collection $subraces;

    /**
     * @var Collection<int, Talent>
     */
    #[ORM\ManyToMany(targetEntity: Talent::class, mappedBy: 'race')]
    private Collection $talent;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'races')]
    private ?Source $source = null;

    #[ORM\ManyToOne(inversedBy: 'races')]
    private ?Part $sourcePart = null;

    public function __construct()
    {
        $this->subraces = new ArrayCollection();
        $this->talent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
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

    public function getAbilityInc(): ?string
    {
        return $this->ability_inc;
    }

    public function setAbilityInc(?string $ability_inc): static
    {
        $this->ability_inc = $ability_inc;

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

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(?string $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): static
    {
        $this->size = $size;

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

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection<int, Subrace>
     */
    public function getSubraces(): Collection
    {
        return $this->subraces;
    }

    public function addSubrace(Subrace $subrace): static
    {
        if (!$this->subraces->contains($subrace)) {
            $this->subraces->add($subrace);
            $subrace->setSource($this);
        }

        return $this;
    }

    public function removeSubrace(Subrace $subrace): static
    {
        if ($this->subraces->removeElement($subrace)) {
            // set the owning side to null (unless already changed)
            if ($subrace->getSource() === $this) {
                $subrace->setSource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Talent>
     */
    public function getTalent(): Collection
    {
        return $this->talent;
    }

    public function addTalent(Talent $talent): static
    {
        if (!$this->talent->contains($talent)) {
            $this->talent->add($talent);
            $talent->addRace($this);
        }

        return $this;
    }

    public function removeTalent(Talent $talent): static
    {
        if ($this->talent->removeElement($talent)) {
            $talent->removeRace($this);
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

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getSourcePart(): ?Part
    {
        return $this->sourcePart;
    }

    public function setSourcePart(?Part $sourcePart): static
    {
        $this->sourcePart = $sourcePart;

        return $this;
    }
}
