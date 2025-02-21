<?php

namespace App\Entity;

use App\Repository\SpecialtyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialtyRepository::class)]
class Specialty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr1 = null;

    #[ORM\OneToOne(inversedBy: 'specialty', cascade: ['persist', 'remove'])]
    private ?Classe $classe = null;

    /**
     * @var Collection<int, SpecialtyItem>
     */
    #[ORM\OneToMany(targetEntity: SpecialtyItem::class, mappedBy: 'specialty')]
    private Collection $specialtyItems;

    public function __construct()
    {
        $this->specialtyItems = new ArrayCollection();
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

    public function getDescr1(): ?string
    {
        return $this->descr1;
    }

    public function setDescr1(string $descr1): static
    {
        $this->descr1 = $descr1;

        return $this;
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

    /**
     * @return Collection<int, SpecialtyItem>
     */
    public function getSpecialtyItems(): Collection
    {
        return $this->specialtyItems;
    }

    public function addSpecialtyItem(SpecialtyItem $specialtyItem): static
    {
        if (!$this->specialtyItems->contains($specialtyItem)) {
            $this->specialtyItems->add($specialtyItem);
            $specialtyItem->setSpecialty($this);
        }

        return $this;
    }

    public function removeSpecialtyItem(SpecialtyItem $specialtyItem): static
    {
        if ($this->specialtyItems->removeElement($specialtyItem)) {
            // set the owning side to null (unless already changed)
            if ($specialtyItem->getSpecialty() === $this) {
                $specialtyItem->setSpecialty(null);
            }
        }

        return $this;
    }
}
