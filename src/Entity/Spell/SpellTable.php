<?php

namespace App\Entity\Spell;

use App\Repository\Spell\SpellTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpellTableRepository::class)]
class SpellTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $show_name = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column(length: 100)]
    private ?string $th1 = null;

    #[ORM\Column(length: 100)]
    private ?string $th2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th5 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th6 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td1 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td6 = null;

    #[ORM\Column]
    private ?int $place = null;

    #[ORM\ManyToOne(inversedBy: 'tables')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Spell $spell = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td1 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td2 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td3 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td4 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td5 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr6_td6 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td1 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td2 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td3 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td4 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td5 = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $tr7_td6 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isShowName(): ?bool
    {
        return $this->show_name;
    }

    public function setShowName(bool $show_name): static
    {
        $this->show_name = $show_name;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

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

    public function getTh3(): ?string
    {
        return $this->th3;
    }

    public function setTh3(?string $th3): static
    {
        $this->th3 = $th3;

        return $this;
    }

    public function getTh4(): ?string
    {
        return $this->th4;
    }

    public function setTh4(?string $th4): static
    {
        $this->th4 = $th4;

        return $this;
    }

    public function getTh5(): ?string
    {
        return $this->th5;
    }

    public function setTh5(?string $th5): static
    {
        $this->th5 = $th5;

        return $this;
    }

    public function getTh6(): ?string
    {
        return $this->th6;
    }

    public function setTh6(?string $th6): static
    {
        $this->th6 = $th6;

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

    public function getTr1Td3(): ?string
    {
        return $this->tr1_td3;
    }

    public function setTr1Td3(?string $tr1_td3): static
    {
        $this->tr1_td3 = $tr1_td3;

        return $this;
    }

    public function getTr1Td4(): ?string
    {
        return $this->tr1_td4;
    }

    public function setTr1Td4(?string $tr1_td4): static
    {
        $this->tr1_td4 = $tr1_td4;

        return $this;
    }

    public function getTr1Td5(): ?string
    {
        return $this->tr1_td5;
    }

    public function setTr1Td5(?string $tr1_td5): static
    {
        $this->tr1_td5 = $tr1_td5;

        return $this;
    }

    public function getTr1Td6(): ?string
    {
        return $this->tr1_td6;
    }

    public function setTr1Td6(?string $tr1_td6): static
    {
        $this->tr1_td6 = $tr1_td6;

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

    public function getTr2Td3(): ?string
    {
        return $this->tr2_td3;
    }

    public function setTr2Td3(?string $tr2_td3): static
    {
        $this->tr2_td3 = $tr2_td3;

        return $this;
    }

    public function getTr2Td4(): ?string
    {
        return $this->tr2_td4;
    }

    public function setTr2Td4(?string $tr2_td4): static
    {
        $this->tr2_td4 = $tr2_td4;

        return $this;
    }

    public function getTr2Td5(): ?string
    {
        return $this->tr2_td5;
    }

    public function setTr2Td5(?string $tr2_td5): static
    {
        $this->tr2_td5 = $tr2_td5;

        return $this;
    }

    public function getTr2Td6(): ?string
    {
        return $this->tr2_td6;
    }

    public function setTr2Td6(?string $tr2_td6): static
    {
        $this->tr2_td6 = $tr2_td6;

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

    public function getTr3Td3(): ?string
    {
        return $this->tr3_td3;
    }

    public function setTr3Td3(?string $tr3_td3): static
    {
        $this->tr3_td3 = $tr3_td3;

        return $this;
    }

    public function getTr3Td4(): ?string
    {
        return $this->tr3_td4;
    }

    public function setTr3Td4(?string $tr3_td4): static
    {
        $this->tr3_td4 = $tr3_td4;

        return $this;
    }

    public function getTr3Td5(): ?string
    {
        return $this->tr3_td5;
    }

    public function setTr3Td5(?string $tr3_td5): static
    {
        $this->tr3_td5 = $tr3_td5;

        return $this;
    }

    public function getTr3Td6(): ?string
    {
        return $this->tr3_td6;
    }

    public function setTr3Td6(?string $tr3_td6): static
    {
        $this->tr3_td6 = $tr3_td6;

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

    public function getTr4Td3(): ?string
    {
        return $this->tr4_td3;
    }

    public function setTr4Td3(?string $tr4_td3): static
    {
        $this->tr4_td3 = $tr4_td3;

        return $this;
    }

    public function getTr4Td4(): ?string
    {
        return $this->tr4_td4;
    }

    public function setTr4Td4(?string $tr4_td4): static
    {
        $this->tr4_td4 = $tr4_td4;

        return $this;
    }

    public function getTr4Td5(): ?string
    {
        return $this->tr4_td5;
    }

    public function setTr4Td5(?string $tr4_td5): static
    {
        $this->tr4_td5 = $tr4_td5;

        return $this;
    }

    public function getTr4Td6(): ?string
    {
        return $this->tr4_td6;
    }

    public function setTr4Td6(?string $tr4_td6): static
    {
        $this->tr4_td6 = $tr4_td6;

        return $this;
    }

    public function getTr5Td1(): ?string
    {
        return $this->tr5_td1;
    }

    public function setTr5Td1(?string $tr5_td1): static
    {
        $this->tr5_td1 = $tr5_td1;

        return $this;
    }

    public function getTr5Td2(): ?string
    {
        return $this->tr5_td2;
    }

    public function setTr5Td2(?string $tr5_td2): static
    {
        $this->tr5_td2 = $tr5_td2;

        return $this;
    }

    public function getTr5Td3(): ?string
    {
        return $this->tr5_td3;
    }

    public function setTr5Td3(?string $tr5_td3): static
    {
        $this->tr5_td3 = $tr5_td3;

        return $this;
    }

    public function getTr5Td4(): ?string
    {
        return $this->tr5_td4;
    }

    public function setTr5Td4(?string $tr5_td4): static
    {
        $this->tr5_td4 = $tr5_td4;

        return $this;
    }

    public function getTr5Td5(): ?string
    {
        return $this->tr5_td5;
    }

    public function setTr5Td5(?string $tr5_td5): static
    {
        $this->tr5_td5 = $tr5_td5;

        return $this;
    }

    public function getTr5Td6(): ?string
    {
        return $this->tr5_td6;
    }

    public function setTr5Td6(?string $tr5_td6): static
    {
        $this->tr5_td6 = $tr5_td6;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getSpell(): ?Spell
    {
        return $this->spell;
    }

    public function setSpell(?Spell $spell): static
    {
        $this->spell = $spell;

        return $this;
    }

    public function getTr6Td1(): ?string
    {
        return $this->tr6_td1;
    }

    public function setTr6Td1(?string $tr6_td1): static
    {
        $this->tr6_td1 = $tr6_td1;

        return $this;
    }

    public function getTr6Td2(): ?string
    {
        return $this->tr6_td2;
    }

    public function setTr6Td2(?string $tr6_td2): static
    {
        $this->tr6_td2 = $tr6_td2;

        return $this;
    }

    public function getTr6Td3(): ?string
    {
        return $this->tr6_td3;
    }

    public function setTr6Td3(?string $tr6_td3): static
    {
        $this->tr6_td3 = $tr6_td3;

        return $this;
    }

    public function getTr6Td4(): ?string
    {
        return $this->tr6_td4;
    }

    public function setTr6Td4(?string $tr6_td4): static
    {
        $this->tr6_td4 = $tr6_td4;

        return $this;
    }

    public function getTr6Td5(): ?string
    {
        return $this->tr6_td5;
    }

    public function setTr6Td5(?string $tr6_td5): static
    {
        $this->tr6_td5 = $tr6_td5;

        return $this;
    }

    public function getTr6Td6(): ?string
    {
        return $this->tr6_td6;
    }

    public function setTr6Td6(?string $tr6_td6): static
    {
        $this->tr6_td6 = $tr6_td6;

        return $this;
    }

    public function getTr7Td1(): ?string
    {
        return $this->tr7_td1;
    }

    public function setTr7Td1(?string $tr7_td1): static
    {
        $this->tr7_td1 = $tr7_td1;

        return $this;
    }

    public function getTr7Td2(): ?string
    {
        return $this->tr7_td2;
    }

    public function setTr7Td2(?string $tr7_td2): static
    {
        $this->tr7_td2 = $tr7_td2;

        return $this;
    }

    public function getTr7Td3(): ?string
    {
        return $this->tr7_td3;
    }

    public function setTr7Td3(?string $tr7_td3): static
    {
        $this->tr7_td3 = $tr7_td3;

        return $this;
    }

    public function getTr7Td4(): ?string
    {
        return $this->tr7_td4;
    }

    public function setTr7Td4(?string $tr7_td4): static
    {
        $this->tr7_td4 = $tr7_td4;

        return $this;
    }

    public function getTr7Td5(): ?string
    {
        return $this->tr7_td5;
    }

    public function setTr7Td5(?string $tr7_td5): static
    {
        $this->tr7_td5 = $tr7_td5;

        return $this;
    }

    public function getTr7Td6(): ?string
    {
        return $this->tr7_td6;
    }

    public function setTr7Td6(?string $tr7_td6): static
    {
        $this->tr7_td6 = $tr7_td6;

        return $this;
    }
}
