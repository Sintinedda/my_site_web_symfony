<?php

namespace App\Entity\Specialty;

use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Repository\Specialty\SpecialtyItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialtyItemRepository::class)]
class SpecialtyItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Specialty>
     */
    #[ORM\ManyToMany(targetEntity: Specialty::class, inversedBy: 'specialtyItems')]
    private Collection $specialty;

    #[ORM\Column(length: 1020)]
    private ?string $descr1 = null;

    /**
     * @var Collection<int, SpecialtySkill>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtySkill::class, mappedBy: 'specialty')]
    private Collection $specialtySkills;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr2 = null;

    #[ORM\Column]
    private ?bool $ua = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $part = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $part2 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr3 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr4 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr5 = null;

    #[ORM\OneToOne(mappedBy: 'domain', cascade: ['persist', 'remove'])]
    private ?DomainSpellTable $spellTable = null;

    /**
     * @var Collection<int, SpecialtyItemTable>
     */
    #[ORM\ManyToMany(targetEntity: SpecialtyItemTable::class, mappedBy: 'specialties')]
    private Collection $tables;

    /**
     * @var Collection<int, Source>
     */
    #[ORM\ManyToMany(targetEntity: Source::class, mappedBy: 'specialties')]
    private Collection $sources;

    /**
     * @var Collection<int, Part>
     */
    #[ORM\ManyToMany(targetEntity: Part::class, mappedBy: 'specialties')]
    private Collection $sourceParts;

    public function __construct()
    {
        $this->specialty = new ArrayCollection();
        $this->specialtySkills = new ArrayCollection();
        $this->tables = new ArrayCollection();
        $this->sources = new ArrayCollection();
        $this->sourceParts = new ArrayCollection();
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
     * @return Collection<int, Specialty>
     */
    public function getSpecialty(): Collection
    {
        return $this->specialty;
    }

    public function setSpecialty(Specialty $specialty): static
    {
        if (!$this->specialty->contains($specialty)) {
            $this->specialty->add($specialty);
        }

        return $this;
    }

    public function removeSpecialty(Specialty $specialty): static
    {
        $this->specialty->removeElement($specialty);

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

    /**
     * @return Collection<int, SpecialtySkill>
     */
    public function getSpecialtySkills(): Collection
    {
        return $this->specialtySkills;
    }

    public function addSpecialtySkill(SpecialtySkill $specialtySkill): static
    {
        if (!$this->specialtySkills->contains($specialtySkill)) {
            $this->specialtySkills->add($specialtySkill);
            $specialtySkill->setSpecialty($this);
        }

        return $this;
    }

    public function removeSpecialtySkill(SpecialtySkill $specialtySkill): static
    {
        if ($this->specialtySkills->removeElement($specialtySkill)) {
            $specialtySkill->removeSpecialty($this);
        }

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

    public function isUa(): ?bool
    {
        return $this->ua;
    }

    public function setUa(bool $ua): static
    {
        $this->ua = $ua;

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

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(?string $part): static
    {
        $this->part = $part;

        return $this;
    }

    public function getPart2(): ?string
    {
        return $this->part2;
    }

    public function setPart2(?string $part2): static
    {
        $this->part2 = $part2;

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

    public function getSpellTable(): ?DomainSpellTable
    {
        return $this->spellTable;
    }

    public function setSpellTable(?DomainSpellTable $spellTable): static
    {
        // unset the owning side of the relation if necessary
        if ($spellTable === null && $this->spellTable !== null) {
            $this->spellTable->setDomain(null);
        }

        // set the owning side of the relation if necessary
        if ($spellTable !== null && $spellTable->getDomain() !== $this) {
            $spellTable->setDomain($this);
        }

        $this->spellTable = $spellTable;

        return $this;
    }

    /**
     * @return Collection<int, SpecialtyItemTable>
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(SpecialtyItemTable $table): static
    {
        if (!$this->tables->contains($table)) {
            $this->tables->add($table);
            $table->addSpecialty($this);
        }

        return $this;
    }

    public function removeTable(SpecialtyItemTable $table): static
    {
        if ($this->tables->removeElement($table)) {
            $table->removeSpecialty($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Source>
     */
    public function getSources(): Collection
    {
        return $this->sources;
    }

    public function addSource(Source $source): static
    {
        if (!$this->sources->contains($source)) {
            $this->sources->add($source);
            $source->addSpecialty($this);
        }

        return $this;
    }

    public function removeSource(Source $source): static
    {
        if ($this->sources->removeElement($source)) {
            $source->removeSpecialty($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Part>
     */
    public function getSourceParts(): Collection
    {
        return $this->sourceParts;
    }

    public function addSourcePart(Part $sourcePart): static
    {
        if (!$this->sourceParts->contains($sourcePart)) {
            $this->sourceParts->add($sourcePart);
            $sourcePart->addSpecialty($this);
        }

        return $this;
    }

    public function removeSourcePart(Part $sourcePart): static
    {
        if ($this->sourceParts->removeElement($sourcePart)) {
            $sourcePart->removeSpecialty($this);
        }

        return $this;
    }
}
