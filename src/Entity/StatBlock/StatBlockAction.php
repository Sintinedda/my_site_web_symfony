<?php

namespace App\Entity\StatBlock;

use App\Repository\StatBlock\StatBlockActionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatBlockActionRepository::class)]
class StatBlockAction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr = null;

    /**
     * @var Collection<int, StatBlock>
     */
    #[ORM\ManyToMany(targetEntity: StatBlock::class, inversedBy: 'statBlockActions')]
    private Collection $statblock;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $target = null;

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

    /**
     * @return Collection<int, StatBlock>
     */
    public function getStatblock(): Collection
    {
        return $this->statblock;
    }

    public function setStatblock(StatBlock $statblock): static
    {
        if (!$this->statblock->contains($statblock)) {
            $this->statblock->add($statblock);
        };

        return $this;
    }

    public function removeStatblock(StatBlock $statblock): static
    {
        $this->statblock->removeElement($statblock);

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

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }
}
