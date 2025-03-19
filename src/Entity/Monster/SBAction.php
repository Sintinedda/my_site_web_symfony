<?php

namespace App\Entity\Monster;

use App\Repository\Monster\SBActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SBActionRepository::class)]
class SBAction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $descr = null;

    #[ORM\Column(nullable: true)]
    private ?string $type = null;

    /**
     * @var Collection<int, SB>
     */
    #[ORM\ManyToMany(targetEntity: SB::class, inversedBy: 'actions')]
    private Collection $monsters;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $damage = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $target = null;

    /**
     * @var Collection<int, ActionPartMonster>
     */
    #[ORM\OneToMany(targetEntity: ActionPartMonster::class, mappedBy: 'action', orphanRemoval: true)]
    private Collection $spes;

    public function __construct()
    {
        $this->monsters = new ArrayCollection();
        $this->spes = new ArrayCollection();
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

    public function setDescr(?string $descr): static
    {
        $this->descr = $descr;

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

    public function getDamage(): ?string
    {
        return $this->damage;
    }

    public function setDamage(?string $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return Collection<int, ActionPartMonster>
     */
    public function getSpes(): Collection
    {
        return $this->spes;
    }

    public function addSpe(ActionPartMonster $spe): static
    {
        if (!$this->spes->contains($spe)) {
            $this->spes->add($spe);
            $spe->setAction($this);
        }

        return $this;
    }

    public function removeSpe(ActionPartMonster $spe): static
    {
        if ($this->spes->removeElement($spe)) {
            // set the owning side to null (unless already changed)
            if ($spe->getAction() === $this) {
                $spe->setAction(null);
            }
        }

        return $this;
    }
}
