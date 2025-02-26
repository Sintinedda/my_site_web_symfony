<?php

namespace App\Entity;

use App\Repository\TalentTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TalentTableRepository::class)]
class TalentTable
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

    #[ORM\Column(length: 100)]
    private ?string $tr1_td1 = null;

    #[ORM\Column(length: 255)]
    private ?string $tr1_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr1_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr2_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr2_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr3_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr3_td3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr4_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr5_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr5_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr6_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr6_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr6_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr7_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr7_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr7_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr8_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr8_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr8_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr9_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr9_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr9_td3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tr10_td1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr10_td2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tr10_td3 = null;

    #[ORM\OneToOne(inversedBy: 'talentTable', cascade: ['persist', 'remove'])]
    private ?Talent $talent = null;

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

    public function getTr8Td1(): ?string
    {
        return $this->tr8_td1;
    }

    public function setTr8Td1(?string $tr8_td1): static
    {
        $this->tr8_td1 = $tr8_td1;

        return $this;
    }

    public function getTr8Td2(): ?string
    {
        return $this->tr8_td2;
    }

    public function setTr8Td2(?string $tr8_td2): static
    {
        $this->tr8_td2 = $tr8_td2;

        return $this;
    }

    public function getTr8Td3(): ?string
    {
        return $this->tr8_td3;
    }

    public function setTr8Td3(?string $tr8_td3): static
    {
        $this->tr8_td3 = $tr8_td3;

        return $this;
    }

    public function getTr9Td1(): ?string
    {
        return $this->tr9_td1;
    }

    public function setTr9Td1(?string $tr9_td1): static
    {
        $this->tr9_td1 = $tr9_td1;

        return $this;
    }

    public function getTr9Td2(): ?string
    {
        return $this->tr9_td2;
    }

    public function setTr9Td2(?string $tr9_td2): static
    {
        $this->tr9_td2 = $tr9_td2;

        return $this;
    }

    public function getTr9Td3(): ?string
    {
        return $this->tr9_td3;
    }

    public function setTr9Td3(?string $tr9_td3): static
    {
        $this->tr9_td3 = $tr9_td3;

        return $this;
    }

    public function getTr10Td1(): ?string
    {
        return $this->tr10_td1;
    }

    public function setTr10Td1(?string $tr10_td1): static
    {
        $this->tr10_td1 = $tr10_td1;

        return $this;
    }

    public function getTr10Td2(): ?string
    {
        return $this->tr10_td2;
    }

    public function setTr10Td2(?string $tr10_td2): static
    {
        $this->tr10_td2 = $tr10_td2;

        return $this;
    }

    public function getTr10Td3(): ?string
    {
        return $this->tr10_td3;
    }

    public function setTr10Td3(?string $tr10_td3): static
    {
        $this->tr10_td3 = $tr10_td3;

        return $this;
    }

    public function getTalent(): ?Talent
    {
        return $this->talent;
    }

    public function setTalent(?Talent $talent): static
    {
        $this->talent = $talent;

        return $this;
    }
}
