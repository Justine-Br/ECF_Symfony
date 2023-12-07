<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $laveVaisselle = null;

    #[ORM\Column]
    private ?bool $laveLinge = null;

    #[ORM\Column]
    private ?bool $climatisation = null;

    #[ORM\Column]
    private ?bool $television = null;

    #[ORM\Column]
    private ?bool $terasse = null;

    #[ORM\Column]
    private ?bool $barbecue = null;

    #[ORM\Column]
    private ?bool $piscinePrivee = null;

    #[ORM\Column]
    private ?bool $piscineCollective = null;

    #[ORM\Column]
    private ?bool $tennis = null;

    #[ORM\Column]
    private ?bool $pingPong = null;

    #[ORM\Column]
    private ?bool $wifi = null;

    #[ORM\OneToOne(inversedBy: 'equipement', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gite $gite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLaveVaisselle(): ?bool
    {
        return $this->laveVaisselle;
    }

    public function setLaveVaisselle(bool $laveVaisselle): static
    {
        $this->laveVaisselle = $laveVaisselle;

        return $this;
    }

    public function isLaveLinge(): ?bool
    {
        return $this->laveLinge;
    }

    public function setLaveLinge(bool $laveLinge): static
    {
        $this->laveLinge = $laveLinge;

        return $this;
    }

    public function isClimatisation(): ?bool
    {
        return $this->climatisation;
    }

    public function setClimatisation(bool $climatisation): static
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    public function isTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(bool $television): static
    {
        $this->television = $television;

        return $this;
    }

    public function isTerasse(): ?bool
    {
        return $this->terasse;
    }

    public function setTerasse(bool $terasse): static
    {
        $this->terasse = $terasse;

        return $this;
    }

    public function isBarbecue(): ?bool
    {
        return $this->barbecue;
    }

    public function setBarbecue(bool $barbecue): static
    {
        $this->barbecue = $barbecue;

        return $this;
    }

    public function isPiscinePrivee(): ?bool
    {
        return $this->piscinePrivee;
    }

    public function setPiscinePrivee(bool $piscinePrivee): static
    {
        $this->piscinePrivee = $piscinePrivee;

        return $this;
    }

    public function isPiscineCollective(): ?bool
    {
        return $this->piscineCollective;
    }

    public function setPiscineCollective(bool $piscineCollective): static
    {
        $this->piscineCollective = $piscineCollective;

        return $this;
    }

    public function isTennis(): ?bool
    {
        return $this->tennis;
    }

    public function setTennis(bool $tennis): static
    {
        $this->tennis = $tennis;

        return $this;
    }

    public function isPingPong(): ?bool
    {
        return $this->pingPong;
    }

    public function setPingPong(bool $pingPong): static
    {
        $this->pingPong = $pingPong;

        return $this;
    }

    public function isWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(bool $wifi): static
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getGite(): ?Gite
    {
        return $this->gite;
    }

    public function setGite(Gite $gite): static
    {
        $this->gite = $gite;

        return $this;
    }

}
