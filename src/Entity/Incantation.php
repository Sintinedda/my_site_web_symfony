<?php

namespace App\Entity;

use App\Repository\IncantationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncantationRepository::class)]
class Incantation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'incantation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr = null;

    #[ORM\Column(length: 255)]
    private ?string $title1 = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr_one1 = null;

    #[ORM\Column(length: 255)]
    private ?string $title2 = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr_two1 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_two2 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_two3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title3 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_three1 = null;

    #[ORM\Column(length: 255)]
    private ?string $title4 = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr_four1 = null;

    #[ORM\Column(length: 255)]
    private ?string $capacity = null;

    #[ORM\Column(length: 255)]
    private ?string $title5 = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr_five1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title6 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_six1 = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_three2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(Classe $classe): static
    {
        $this->classe = $classe;

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

    public function getTitle1(): ?string
    {
        return $this->title1;
    }

    public function setTitle1(string $title1): static
    {
        $this->title1 = $title1;

        return $this;
    }

    public function getDescrOne1(): ?string
    {
        return $this->descr_one1;
    }

    public function setDescrOne1(string $descr_one1): static
    {
        $this->descr_one1 = $descr_one1;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(string $title2): static
    {
        $this->title2 = $title2;

        return $this;
    }

    public function getDescrTwo1(): ?string
    {
        return $this->descr_two1;
    }

    public function setDescrTwo1(string $descr_two1): static
    {
        $this->descr_two1 = $descr_two1;

        return $this;
    }

    public function getDescrTwo2(): ?string
    {
        return $this->descr_two2;
    }

    public function setDescrTwo2(?string $descr_two2): static
    {
        $this->descr_two2 = $descr_two2;

        return $this;
    }

    public function getDescrTwo3(): ?string
    {
        return $this->descr_two3;
    }

    public function setDescrTwo3(?string $descr_two3): static
    {
        $this->descr_two3 = $descr_two3;

        return $this;
    }

    public function getTitle3(): ?string
    {
        return $this->title3;
    }

    public function setTitle3(?string $title3): static
    {
        $this->title3 = $title3;

        return $this;
    }

    public function getDescrThree1(): ?string
    {
        return $this->descr_three1;
    }

    public function setDescrThree1(?string $descr_three1): static
    {
        $this->descr_three1 = $descr_three1;

        return $this;
    }

    public function getTitle4(): ?string
    {
        return $this->title4;
    }

    public function setTitle4(string $title4): static
    {
        $this->title4 = $title4;

        return $this;
    }

    public function getDescrFour1(): ?string
    {
        return $this->descr_four1;
    }

    public function setDescrFour1(string $descr_four1): static
    {
        $this->descr_four1 = $descr_four1;

        return $this;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function setCapacity(string $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getTitle5(): ?string
    {
        return $this->title5;
    }

    public function setTitle5(string $title5): static
    {
        $this->title5 = $title5;

        return $this;
    }

    public function getDescrFive1(): ?string
    {
        return $this->descr_five1;
    }

    public function setDescrFive1(string $descr_five1): static
    {
        $this->descr_five1 = $descr_five1;

        return $this;
    }

    public function getTitle6(): ?string
    {
        return $this->title6;
    }

    public function setTitle6(?string $title6): static
    {
        $this->title6 = $title6;

        return $this;
    }

    public function getDescrSix1(): ?string
    {
        return $this->descr_six1;
    }

    public function setDescrSix1(?string $descr_six1): static
    {
        $this->descr_six1 = $descr_six1;

        return $this;
    }

    public function getDescrThree2(): ?string
    {
        return $this->descr_three2;
    }

    public function setDescrThree2(?string $descr_three2): static
    {
        $this->descr_three2 = $descr_three2;

        return $this;
    }
}
