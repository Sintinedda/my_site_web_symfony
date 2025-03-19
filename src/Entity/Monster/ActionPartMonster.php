<?php

namespace App\Entity\Monster;

use App\Repository\Monster\ActionPartMonsterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionPartMonsterRepository::class)]
class ActionPartMonster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descr = null;

    #[ORM\ManyToOne(inversedBy: 'spes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SB $monster = null;

    #[ORM\ManyToOne(inversedBy: 'spes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SBAction $action = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMonster(): ?SB
    {
        return $this->monster;
    }

    public function setMonster(?SB $monster): static
    {
        $this->monster = $monster;

        return $this;
    }

    public function getAction(): ?SBAction
    {
        return $this->action;
    }

    public function setAction(?SBAction $action): static
    {
        $this->action = $action;

        return $this;
    }
}
