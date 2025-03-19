<?php

namespace App\Entity\Source;

use App\Entity\Monster\SB;
use App\Entity\Race\SourceRace;
use App\Entity\Specialty\SpecialtyItem;
use App\Entity\Spell\Spell;
use App\Repository\Source\SourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SourceRepository::class)]
class Source
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Part>
     */
    #[ORM\OneToMany(targetEntity: Part::class, mappedBy: 'source', orphanRemoval: true)]
    private Collection $parts;

    /**
     * @var Collection<int, SB>
     */
    #[ORM\OneToMany(targetEntity: SB::class, mappedBy: 'source')]
    private Collection $monsters;

    /**
     * @var Collection<int, SourceRace>
     */
    #[ORM\OneToMany(targetEntity: SourceRace::class, mappedBy: 'source')]
    private Collection $races;

    /**
     * @var Collection<int, SpecialtyItem>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtyItem::class, inversedBy: 'sources')]
    private Collection $specialties;

    /**
     * @var Collection<int, Spell>
     */
    #[ORM\OneToMany(targetEntity: Spell::class, mappedBy: 'source')]
    private Collection $spells;

    public function __construct()
    {
        $this->parts = new ArrayCollection();
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

    /**
     * @return Collection<int, Part>
     */
    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function addPart(Part $part): static
    {
        if (!$this->parts->contains($part)) {
            $this->parts->add($part);
            $part->setSource($this);
        }

        return $this;
    }

    public function removePart(Part $part): static
    {
        if ($this->parts->removeElement($part)) {
            // set the owning side to null (unless already changed)
            if ($part->getSource() === $this) {
                $part->setSource(null);
            }
        }

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
            $monster->setSource($this);
        }

        return $this;
    }

    public function removeMonster(SB $monster): static
    {
        if ($this->monsters->removeElement($monster)) {
            // set the owning side to null (unless already changed)
            if ($monster->getSource() === $this) {
                $monster->setSource(null);
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
            $race->setSource($this);
        }

        return $this;
    }

    public function removeRace(SourceRace $race): static
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getSource() === $this) {
                $race->setSource(null);
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
            $spell->setSource($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): static
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getSource() === $this) {
                $spell->setSource(null);
            }
        }

        return $this;
    }
}
