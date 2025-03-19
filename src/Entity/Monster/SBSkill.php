<?php

namespace App\Entity\Monster;

use App\Repository\Monster\SBSkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SBSkillRepository::class)]
class SBSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, SB>
     */
    #[ORM\ManyToMany(targetEntity: SB::class, inversedBy: 'skills')]
    private Collection $monsters;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $descr = null;

    #[ORM\Column(length: 10)]
    private ?string $part = null;

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

    /**
     * @return Collection<int, SB>
     */
    public function getMonsters(): Collection
    {
        return $this->monsters;
    }

    public function addMonsters(SB $monsters): static
    {
        if (!$this->monsters->contains($monsters)) {
            $this->monsters->add($monsters);
        }

        return $this;
    }

    public function removeMonsters(SB $monsters): static
    {
        $this->monsters->removeElement($monsters);

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

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(string $part): static
    {
        $this->part = $part;

        return $this;
    }
}
