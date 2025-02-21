<?php

namespace App\Entity;

use App\Repository\SpecialtyItemRepository;
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

    #[ORM\ManyToOne(inversedBy: 'specialtyItems')]
    private ?Specialty $specialty = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr1 = null;

    /**
     * @var Collection<int, SpecialtySkill>
     */
    #[ORM\OneToMany(targetEntity: SpecialtySkill::class, mappedBy: 'specialty')]
    private Collection $specialtySkills;

    #[ORM\Column(length: 255)]
    private ?string $source = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr2 = null;

    public function __construct()
    {
        $this->specialtySkills = new ArrayCollection();
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

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(?Specialty $specialty): static
    {
        $this->specialty = $specialty;

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
            // set the owning side to null (unless already changed)
            if ($specialtySkill->getSpecialty() === $this) {
                $specialtySkill->setSpecialty(null);
            }
        }

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

    public function getDescr2(): ?string
    {
        return $this->descr2;
    }

    public function setDescr2(?string $descr2): static
    {
        $this->descr2 = $descr2;

        return $this;
    }
}
