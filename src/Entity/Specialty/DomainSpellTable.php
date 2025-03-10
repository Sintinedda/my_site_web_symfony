<?php

namespace App\Entity\Specialty;

use App\Repository\Specialty\DomainSpellTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainSpellTableRepository::class)]
class DomainSpellTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;
    #[ORM\Column(length: 255)]
    private ?string $tr1_td2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr2_td2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr3_td2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr4_td2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr5_td2 = null;

    #[ORM\OneToOne(inversedBy: 'spellTable', cascade: ['persist'])]
    private ?SpecialtyItem $domain = null;

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

    public function getTr1Td2(): ?string
    {
        return $this->tr1_td2;
    }

    public function setTr1Td2(string $tr1_td2): static
    {
        $this->tr1_td2 = $tr1_td2;

        return $this;
    }

    public function getTr2Td2(): ?string
    {
        return $this->tr2_td2;
    }

    public function setTr2Td2(string $tr2_td2): static
    {
        $this->tr2_td2 = $tr2_td2;

        return $this;
    }

    public function getTr3Td2(): ?string
    {
        return $this->tr3_td2;
    }

    public function setTr3Td2(string $tr3_td2): static
    {
        $this->tr3_td2 = $tr3_td2;

        return $this;
    }

    public function getTr4Td2(): ?string
    {
        return $this->tr4_td2;
    }

    public function setTr4Td2(string $tr4_td2): static
    {
        $this->tr4_td2 = $tr4_td2;

        return $this;
    }

    public function getTr5Td2(): ?string
    {
        return $this->tr5_td2;
    }

    public function setTr5Td2(string $tr5_td2): static
    {
        $this->tr5_td2 = $tr5_td2;

        return $this;
    }

    public function getDomain(): ?SpecialtyItem
    {
        return $this->domain;
    }

    public function setDomain(?SpecialtyItem $domain): static
    {
        $this->domain = $domain;

        return $this;
    }
}
