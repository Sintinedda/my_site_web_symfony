<?php

namespace App\Entity;

use App\Repository\TalentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TalentRepository::class)]
class Talent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, Race>
     */
    #[ORM\ManyToMany(targetEntity: Race::class, inversedBy: 'talent')]
    private Collection $race;

    /**
     * @var Collection<int, Subrace>
     */
    #[ORM\ManyToMany(targetEntity: Subrace::class, inversedBy: 'talent')]
    private Collection $subrace;

    public function __construct()
    {
        $this->race = new ArrayCollection();
        $this->subrace = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(Race $race): static
    {
        if (!$this->race->contains($race)) {
            $this->race->add($race);
        }

        return $this;
    }

    public function removeRace(Race $race): static
    {
        $this->race->removeElement($race);

        return $this;
    }

    /**
     * @return Collection<int, Subrace>
     */
    public function getSubrace(): Collection
    {
        return $this->subrace;
    }

    public function addSubrace(Subrace $subrace): static
    {
        if (!$this->subrace->contains($subrace)) {
            $this->subrace->add($subrace);
        }

        return $this;
    }

    public function removeSubrace(Subrace $subrace): static
    {
        $this->subrace->removeElement($subrace);

        return $this;
    }
}
