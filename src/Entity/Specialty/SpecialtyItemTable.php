<?php

namespace App\Entity\Specialty;

use App\Repository\Specialty\SpecialtyItemTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialtyItemTableRepository::class)]
class SpecialtyItemTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $th1 = null;

    #[ORM\Column(length: 255)]
    private ?string $th2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td1 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td2 = null;

    #[ORM\OneToOne(inversedBy: 'specialtyItemTable', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SpecialtyItem $specialtyItem = null;

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

    public function getTh1(): ?string
    {
        return $this->th1;
    }

    public function setTh1(string $th1): static
    {
        $this->th1 = $th1;

        return $this;
    }

    public function getTh2(): ?string
    {
        return $this->th2;
    }

    public function setTh2(string $th2): static
    {
        $this->th2 = $th2;

        return $this;
    }

    public function getTr1Td1(): ?string
    {
        return $this->tr1_td1;
    }

    public function setTr1Td1(string $tr1_td1): static
    {
        $this->tr1_td1 = $tr1_td1;

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

    public function getTr2Td1(): ?string
    {
        return $this->tr2_td1;
    }

    public function setTr2Td1(?string $tr2_td1): static
    {
        $this->tr2_td1 = $tr2_td1;

        return $this;
    }

    public function getTr2Td2(): ?string
    {
        return $this->tr2_td2;
    }

    public function setTr2Td2(?string $tr2_td2): static
    {
        $this->tr2_td2 = $tr2_td2;

        return $this;
    }

    public function getTr3Td1(): ?string
    {
        return $this->tr3_td1;
    }

    public function setTr3Td1(?string $tr3_td1): static
    {
        $this->tr3_td1 = $tr3_td1;

        return $this;
    }

    public function getTr3Td2(): ?string
    {
        return $this->tr3_td2;
    }

    public function setTr3Td2(?string $tr3_td2): static
    {
        $this->tr3_td2 = $tr3_td2;

        return $this;
    }

    public function getTr4Td1(): ?string
    {
        return $this->tr4_td1;
    }

    public function setTr4Td1(?string $tr4_td1): static
    {
        $this->tr4_td1 = $tr4_td1;

        return $this;
    }

    public function getTr4Td2(): ?string
    {
        return $this->tr4_td2;
    }

    public function setTr4Td2(?string $tr4_td2): static
    {
        $this->tr4_td2 = $tr4_td2;

        return $this;
    }

    public function getSpecialtyItem(): ?SpecialtyItem
    {
        return $this->specialtyItem;
    }

    public function setSpecialtyItem(SpecialtyItem $specialtyItem): static
    {
        $this->specialtyItem = $specialtyItem;

        return $this;
    }
}
