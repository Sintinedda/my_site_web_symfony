<?php

namespace App\Entity\Source;

use App\Entity\Monster\SB;
use App\Entity\Race\SourceRace;
use App\Entity\Specialty\SpecialtyItem;
use App\Entity\Spell\Spell;
use App\Repository\Source\PartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartRepository::class)]
class Part
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'parts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Source $source = null;

    #[ORM\Column]
    private ?int $number = null;

    /**
     * @var Collection<int, SB>
     */
    #[ORM\OneToMany(targetEntity: SB::class, mappedBy: 'sourcePart')]
    private Collection $monsters;

    /**
     * @var Collection<int, SourceRace>
     */
    #[ORM\OneToMany(targetEntity: SourceRace::class, mappedBy: 'sourcePart')]
    private Collection $races;

    /**
     * @var Collection<int, SpecialtyItem>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtyItem::class, inversedBy: 'sourceParts')]
    private Collection $specialties;

    /**
     * @var Collection<int, Spell>
     */
    #[ORM\OneToMany(targetEntity: Spell::class, mappedBy: 'sourcePart')]
    private Collection $spells;

    public function __construct()
    {
        $this->monsters = new ArrayCollection();
        $this->races = new ArrayCollection();
        $this->specialties = new ArrayCollection();
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

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, SB>
     */
    public function getMonsters(): Collection
    {
        return $this->monsters;
    }

    public function addMonster(SB $monster): static
    {
        if (!$this->monsters->contains($monster)) {
            $this->monsters->add($monster);
            $monster->setSourcePart($this);
        }

        return $this;
    }

    public function removeMonster(SB $monster): static
    {
        if ($this->monsters->removeElement($monster)) {
            // set the owning side to null (unless already changed)
            if ($monster->getSourcePart() === $this) {
                $monster->setSourcePart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SourceRace>
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(SourceRace $race): static
    {
        if (!$this->races->contains($race)) {
            $this->races->add($race);
            $race->setSourcePart($this);
        }

        return $this;
    }

    public function removeRace(SourceRace $race): static
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getSourcePart() === $this) {
                $race->setSourcePart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SpecialtyItem>
     */
    public function getSpecialties(): Collection
    {
        return $this->specialties;
    }

    public function addSpecialty(SpecialtyItem $specialty): static
    {
        if (!$this->specialties->contains($specialty)) {
            $this->specialties->add($specialty);
        }

        return $this;
    }

    public function removeSpecialty(SpecialtyItem $specialty): static
    {
        $this->specialties->removeElement($specialty);

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
            $spell->setSourcePart($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): static
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getSourcePart() === $this) {
                $spell->setSourcePart(null);
            }
        }

        return $this;
    }
}
