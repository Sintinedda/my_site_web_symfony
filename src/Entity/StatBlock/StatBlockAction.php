<?php

namespace App\Entity\StatBlock;

use App\Repository\StatBlock\StatBlockActionRepository;
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

    #[ORM\Column(length: 1020)]
    private ?string $descr = null;

    #[ORM\ManyToOne(inversedBy: 'statBlockActions')]
    private ?StatBlock $StatBlock = null;

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

    public function getStatBlock(): ?StatBlock
    {
        return $this->StatBlock;
    }

    public function setStatBlock(?StatBlock $StatBlock): static
    {
        $this->StatBlock = $StatBlock;

        return $this;
    }
}
