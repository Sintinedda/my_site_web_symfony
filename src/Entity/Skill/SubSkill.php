<?php

namespace App\Entity\Skill;

use App\Repository\Skill\SubSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubSkillRepository::class)]
class SubSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title1 = null;

    #[ORM\Column(length: 1020)]
    private ?string $descr_one = null;

    #[ORM\Column(length: 1020, nullable: true)]
    private ?string $descr_one2 = null;

    #[ORM\OneToOne(inversedBy: 'subSkill', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Skill $skill = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescrOne(): ?string
    {
        return $this->descr_one;
    }

    public function setDescrOne(string $descr_one): static
    {
        $this->descr_one = $descr_one;

        return $this;
    }

    public function getDescrOne2(): ?string
    {
        return $this->descr_one2;
    }

    public function setDescrOne2(?string $descr_one2): static
    {
        $this->descr_one2 = $descr_one2;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(Skill $skill): static
    {
        $this->skill = $skill;

        return $this;
    }
}
