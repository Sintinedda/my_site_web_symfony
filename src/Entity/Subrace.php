<?php

namespace App\Entity;

use App\Repository\SubraceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubraceRepository::class)]
class Subrace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carac_up = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\ManyToOne(inversedBy: 'subraces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    /**
     * @var Collection<int, Talent>
     */
    #[ORM\ManyToMany(targetEntity: Talent::class, mappedBy: 'subrace')]
    private Collection $talent;

    public function __construct()
    {
        $this->talent = new ArrayCollection();
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

    public function getCaracUp(): ?string
    {
        return $this->carac_up;
    }

    public function setCaracUp(?string $carac_up): static
    {
        $this->carac_up = $carac_up;

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

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

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
            $talent->addSubrace($this);
        }

        return $this;
    }

    public function removeTalent(Talent $talent): static
    {
        if ($this->talent->removeElement($talent)) {
            $talent->removeSubrace($this);
        }

        return $this;
    }
}
