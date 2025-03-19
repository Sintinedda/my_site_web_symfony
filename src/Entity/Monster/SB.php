<?php

namespace App\Entity\Monster;

use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Entity\Specialty\SpecialtySkill;
use App\Repository\Monster\SBRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SBRepository::class)]
class SB
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $category = null;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $type2 = null;

    #[ORM\Column]
    private array $sizes = [];

    #[ORM\Column]
    private ?bool $size_inf = null;

    #[ORM\Column]
    private ?bool $size_sup = null;

    #[ORM\Column]
    private ?int $ca = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $armor = null;

    #[ORM\Column(nullable: true)]
    private ?int $pv = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dv = null;

    #[ORM\Column(length: 100)]
    private ?string $speed = null;

    #[ORM\Column]
    private ?int $str = null;

    #[ORM\Column]
    private ?int $dex = null;

    #[ORM\Column]
    private ?int $con = null;

    #[ORM\Column]
    private ?int $intell = null;

    #[ORM\Column]
    private ?int $wis = null;

    #[ORM\Column]
    private ?int $cha = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $save = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $comp = null;

    #[ORM\Column(nullable: true)]
    private ?array $res_damage = null;

    #[ORM\Column(nullable: true)]
    private ?array $res_state = null;

    #[ORM\Column(nullable: true)]
    private ?array $imm_damage = null;

    #[ORM\Column(nullable: true)]
    private ?array $imm_state = null;

    #[ORM\Column(nullable: true)]
    private ?array $sens = null;

    #[ORM\Column(nullable: true)]
    private ?int $pp = null;

    #[ORM\Column(nullable: true)]
    private ?float $fp = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $bm = null;
    
    #[ORM\Column(length: 200, nullable: true)]
    private ?string $touch_cac = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $range_cac = null;
    
    #[ORM\Column(length: 200, nullable: true)]
    private ?string $damage_cac = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $touch_range = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $range_range = null;
    
    #[ORM\Column(length: 200, nullable: true)]
    private ?string $damage_range = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $descr = null;

    /**
     * @var Collection<int, Skill>
     */
    #[ORM\ManyToMany(targetEntity: SBSkill::class, mappedBy: 'monsters')]
    private Collection $skills;

    /**
     * @var Collection<int, Action>
     */
    #[ORM\ManyToMany(targetEntity: SBAction::class, mappedBy: 'monsters')]
    private Collection $actions;

    /**
     * @var Collection<int, Reaction>
     */
    #[ORM\ManyToMany(targetEntity: SBReaction::class, mappedBy: 'monsters')]
    private Collection $reactions;

    #[ORM\OneToOne(inversedBy: 'monster', cascade: ['persist', 'remove'])]
    private ?SpecialtySkill $skill = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $align = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $pp2 = null;

    #[ORM\Column]
    private ?bool $ua = null;

    #[ORM\Column(nullable: true)]
    private ?int $xp = null;

    /**
     * @var Collection<int, ActionPartMonster>
     */
    #[ORM\OneToMany(targetEntity: ActionPartMonster::class, mappedBy: 'monster', orphanRemoval: true)]
    private Collection $spes;

    #[ORM\ManyToOne(inversedBy: 'monsters')]
    private ?Source $source = null;

    #[ORM\ManyToOne(inversedBy: 'monsters')]
    private ?Part $sourcePart = null;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->actions = new ArrayCollection();
        $this->reactions = new ArrayCollection();
        $this->spes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type2;
    }

    public function setType2(?string $type2): static
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getSizes(): array
    {
        return $this->sizes;
    }

    public function setSizes(array $sizes): static
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function isSizeInf(): ?bool
    {
        return $this->size_inf;
    }

    public function setSizeInf(bool $size_inf): static
    {
        $this->size_inf = $size_inf;

        return $this;
    }

    public function isSizeSup(): ?bool
    {
        return $this->size_sup;
    }

    public function setSizeSup(bool $size_sup): static
    {
        $this->size_sup = $size_sup;

        return $this;
    }
    
    public function getCa(): ?int
    {
        return $this->ca;
    }

    public function setCa(int $ca): static
    {
        $this->ca = $ca;

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->armor;
    }

    public function setArmor(?string $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(?int $pv): static
    {
        $this->pv = $pv;

        return $this;
    }

    public function getDv(): ?string
    {
        return $this->dv;
    }

    public function setDv(?string $dv): static
    {
        $this->dv = $dv;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getStr(): ?int
    {
        return $this->str;
    }

    public function setStr(int $str): static
    {
        $this->str = $str;

        return $this;
    }

    public function getDex(): ?int
    {
        return $this->dex;
    }

    public function setDex(int $dex): static
    {
        $this->dex = $dex;

        return $this;
    }

    public function getCon(): ?int
    {
        return $this->con;
    }

    public function setCon(int $con): static
    {
        $this->con = $con;

        return $this;
    }

    public function getIntell(): ?int
    {
        return $this->intell;
    }

    public function setIntell(int $intell): static
    {
        $this->intell = $intell;

        return $this;
    }

    public function getWis(): ?int
    {
        return $this->wis;
    }

    public function setWis(int $wis): static
    {
        $this->wis = $wis;

        return $this;
    }

    public function getCha(): ?int
    {
        return $this->cha;
    }

    public function setCha(int $cha): static
    {
        $this->cha = $cha;

        return $this;
    }

    public function getSave(): ?string
    {
        return $this->save;
    }

    public function setSave(?string $save): static
    {
        $this->save = $save;

        return $this;
    }

    public function getComp(): ?string
    {
        return $this->comp;
    }

    public function setComp(?string $comp): static
    {
        $this->comp = $comp;

        return $this;
    }

    public function getResDamage(): ?array
    {
        return $this->res_damage;
    }

    public function setResDamage(?array $res_damage): static
    {
        $this->res_damage = $res_damage;

        return $this;
    }

    public function getResState(): ?array
    {
        return $this->res_state;
    }

    public function setResState(?array $res_state): static
    {
        $this->res_state = $res_state;

        return $this;
    }

    public function getImmDamage(): ?array
    {
        return $this->imm_damage;
    }

    public function setImmDamage(?array $imm_damage): static
    {
        $this->imm_damage = $imm_damage;

        return $this;
    }

    public function getImmState(): ?array
    {
        return $this->imm_state;
    }

    public function setImmState(?array $imm_state): static
    {
        $this->imm_state = $imm_state;

        return $this;
    }

    public function getSens(): ?array
    {
        return $this->sens;
    }

    public function setSens(?array $sens): static
    {
        $this->sens = $sens;

        return $this;
    }

    public function getPp(): ?int
    {
        return $this->pp;
    }

    public function setPp(?int $pp): static
    {
        $this->pp = $pp;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getFp(): ?float
    {
        return $this->fp;
    }

    public function setFp(?float $fp): static
    {
        $this->fp = $fp;

        return $this;
    }

    public function getBm(): ?string
    {
        return $this->bm;
    }

    public function setBm(?string $bm): static
    {
        $this->bm = $bm;

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

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(SBSkill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->addMonsters($this);
        }

        return $this;
    }

    public function removeSkill(SBSkill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            $skill->removeMonsters($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(SBAction $action): static
    {
        if (!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->addMonster($this);
        }

        return $this;
    }

    public function removeAction(SBAction $action): static
    {
        if ($this->actions->removeElement($action)) {
            $action->removeMonster($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Reaction>
     */
    public function getReactions(): Collection
    {
        return $this->reactions;
    }

    public function addReaction(SBReaction $reaction): static
    {
        if (!$this->reactions->contains($reaction)) {
            $this->reactions->add($reaction);
            $reaction->addMonster($this);
        }

        return $this;
    }

    public function removeReaction(SBReaction $reaction): static
    {
        if ($this->reactions->removeElement($reaction)) {
            $reaction->removeMonster($this);
        }

        return $this;
    }

    public function getSkill(): ?SpecialtySkill
    {
        return $this->skill;
    }

    public function setSkill(?SpecialtySkill $skill): static
    {
        $this->skill = $skill;

        return $this;
    }

    public function getTouchCac(): ?string
    {
        return $this->touch_cac;
    }

    public function setTouchCac(?string $touch_cac): static
    {
        $this->touch_cac = $touch_cac;

        return $this;
    }

    public function getRangeCac(): ?string
    {
        return $this->range_cac;
    }

    public function setRangeCac(?string $range_cac): static
    {
        $this->range_cac = $range_cac;

        return $this;
    }

    public function getDamageCac(): ?string
    {
        return $this->damage_cac;
    }

    public function setDamageCac(?string $damage_cac): static
    {
        $this->damage_cac = $damage_cac;

        return $this;
    }

    public function getTouchRange(): ?string
    {
        return $this->touch_range;
    }

    public function setTouchRange(?string $touch_range): static
    {
        $this->touch_range = $touch_range;

        return $this;
    }

    public function getRangeRange(): ?string
    {
        return $this->range_range;
    }

    public function setRangeRange(?string $range_range): static
    {
        $this->range_range = $range_range;

        return $this;
    }

    public function getDamageRange(): ?string
    {
        return $this->damage_range;
    }

    public function setDamageRange(?string $damage_range): static
    {
        $this->damage_range = $damage_range;

        return $this;
    }

    public function getAlign(): ?string
    {
        return $this->align;
    }

    public function setAlign(?string $align): static
    {
        $this->align = $align;

        return $this;
    }

    public function getPp2(): ?string
    {
        return $this->pp2;
    }

    public function setPp2(?string $pp2): static
    {
        $this->pp2 = $pp2;

        return $this;
    }

    public function isUa(): ?bool
    {
        return $this->ua;
    }

    public function setUa(bool $ua): static
    {
        $this->ua = $ua;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(?int $xp): static
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * @return Collection<int, ActionPartMonster>
     */
    public function getSpes(): Collection
    {
        return $this->spes;
    }

    public function addSpe(ActionPartMonster $spe): static
    {
        if (!$this->spes->contains($spe)) {
            $this->spes->add($spe);
            $spe->setMonster($this);
        }

        return $this;
    }

    public function removeSpe(ActionPartMonster $spe): static
    {
        if ($this->spes->removeElement($spe)) {
            // set the owning side to null (unless already changed)
            if ($spe->getMonster() === $this) {
                $spe->setMonster(null);
            }
        }

        return $this;
    }

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getSourcePart(): ?Part
    {
        return $this->sourcePart;
    }

    public function setSourcePart(?Part $sourcePart): static
    {
        $this->sourcePart = $sourcePart;

        return $this;
    }
}
