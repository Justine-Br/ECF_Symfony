<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProprietaireRepository::class)]
class Proprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomProprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomProprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $disponibiliteProprietaire = null;

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Gite::class)]
    private Collection $gite;

    public function __construct()
    {
        $this->gite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProprietaire(): ?string
    {
        return $this->nomProprietaire;
    }

    public function setNomProprietaire(string $nomProprietaire): static
    {
        $this->nomProprietaire = $nomProprietaire;

        return $this;
    }

    public function getPrenomProprietaire(): ?string
    {
        return $this->prenomProprietaire;
    }

    public function setPrenomProprietaire(string $prenomProprietaire): static
    {
        $this->prenomProprietaire = $prenomProprietaire;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDisponibiliteProprietaire(): ?string
    {
        return $this->disponibiliteProprietaire;
    }

    public function setDisponibiliteProprietaire(string $disponibiliteProprietaire): static
    {
        $this->disponibiliteProprietaire = $disponibiliteProprietaire;

        return $this;
    }

    /**
     * @return Collection<int, Gite>
     */
    public function getGite(): Collection
    {
        return $this->gite;
    }

    public function addGite(Gite $gite): static
    {
        if (!$this->gite->contains($gite)) {
            $this->gite->add($gite);
            $gite->setProprietaire($this);
        }

        return $this;
    }

    public function removeGite(Gite $gite): static
    {
        if ($this->gite->removeElement($gite)) {
            // set the owning side to null (unless already changed)
            if ($gite->getProprietaire() === $this) {
                $gite->setProprietaire(null);
            }
        }

        return $this;
    }
}
