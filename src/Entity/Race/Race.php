<?php

namespace App\Entity\Race;

use App\Repository\Race\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, SourceRace>
     */
    #[ORM\OneToMany(targetEntity: SourceRace::class, mappedBy: 'race')]
    private Collection $sourceRaces;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->sourceRaces = new ArrayCollection();
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
     * @return Collection<int, SourceRace>
     */
    public function getSourceRaces(): Collection
    {
        return $this->sourceRaces;
    }

    public function addSourceRace(SourceRace $sourceRace): static
    {
        if (!$this->sourceRaces->contains($sourceRace)) {
            $this->sourceRaces->add($sourceRace);
            $sourceRace->setRace($this);
        }

        return $this;
    }

    public function removeSourceRace(SourceRace $sourceRace): static
    {
        if ($this->sourceRaces->removeElement($sourceRace)) {
            // set the owning side to null (unless already changed)
            if ($sourceRace->getRace() === $this) {
                $sourceRace->setRace(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
