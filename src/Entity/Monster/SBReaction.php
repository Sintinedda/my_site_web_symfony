<?php

namespace App\Entity\Monster;

use App\Repository\Monster\SBReactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SBReactionRepository::class)]
class SBReaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 500)]
    private ?string $descr = null;

    /**
     * @var Collection<int, SB>
     */
    #[ORM\ManyToMany(targetEntity: SB::class, inversedBy: 'reactions')]
    private Collection $monsters;

    public function __construct()
    {
        $this->monsters = new ArrayCollection();
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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): static
    {
        $this->descr = $descr;

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
        }

        return $this;
    }

    public function removeMonster(SB $monster): static
    {
        $this->monsters->removeElement($monster);

        return $this;
    }
}
