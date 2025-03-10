<?php

namespace App\Entity\Skill;

use App\Repository\Skill\SkillTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillTableRepository::class)]
class SkillTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $th1 = null;

    #[ORM\Column(length: 100)]
    private ?string $th2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $th4 = null;

    #[ORM\Column(length: 100)]
    private ?string $tr1_td1 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr2_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr3_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr4_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr5_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td4 = null;

    #[ORM\Column]
    private ?bool $start = null;

    #[ORM\OneToOne(inversedBy: 'skillTable', cascade: ['persist'])]
    private ?Skill $skill = null;

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

    public function isStart(): ?bool
    {
        return $this->start;
    }

    public function setStart(bool $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): static
    {
        $this->skill = $skill;

        return $this;
    }
}
