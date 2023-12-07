<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteRepository::class)]

class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomGite = null;

    #[ORM\Column]
    private ?int $superficie = null;

    #[ORM\Column]
    private ?int $nombreChambre = null;

    #[ORM\Column]
    private ?int $nombreCouchage = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\OneToOne(mappedBy: 'gite', cascade: ['persist', 'remove'])]
    private ?Equipement $equipement = null;

    #[ORM\ManyToMany(targetEntity: ServicePayant::class, mappedBy: 'gite')]
    private Collection $servicePayants;

    #[ORM\OneToMany(mappedBy: 'gite', targetEntity: Tarif::class, orphanRemoval: true)]
    private Collection $tarif;

    #[ORM\ManyToOne(inversedBy: 'gite')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proprietaire $proprietaire = null;

    #[ORM\ManyToOne(inversedBy: 'gite')]
    private ?Contact $contact = null;

    public function __construct()
    {
        $this->servicePayants = new ArrayCollection();
        $this->tarif = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGite(): ?string
    {
        return $this->nomGite;
    }

    public function setNomGite(string $nomGite): static
    {
        $this->nomGite = $nomGite;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(int $superficie): static
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getNombreChambre(): ?int
    {
        return $this->nombreChambre;
    }

    public function setNombreChambre(int $nombreChambre): static
    {
        $this->nombreChambre = $nombreChambre;

        return $this;
    }

    public function getNombreCouchage(): ?int
    {
        return $this->nombreCouchage;
    }

    public function setNombreCouchage(int $nombreCouchage): static
    {
        $this->nombreCouchage = $nombreCouchage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(Equipement $equipement): static
    {
        // set the owning side of the relation if necessary
        if ($equipement->getGite() !== $this) {
            $equipement->setGite($this);
        }

        $this->equipement = $equipement;

        return $this;
    }

    /**
     * @return Collection<int, ServicePayant>
     */
    public function getServicePayants(): Collection
    {
        return $this->servicePayants;
    }

    public function addServicePayant(ServicePayant $servicePayant): static
    {
        if (!$this->servicePayants->contains($servicePayant)) {
            $this->servicePayants->add($servicePayant);
            $servicePayant->addGite($this);
        }

        return $this;
    }

    public function removeServicePayant(ServicePayant $servicePayant): static
    {
        if ($this->servicePayants->removeElement($servicePayant)) {
            $servicePayant->removeGite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarif>
     */
    public function getTarif(): Collection
    {
        return $this->tarif;
    }

    public function addTarif(Tarif $tarif): static
    {
        if (!$this->tarif->contains($tarif)) {
            $this->tarif->add($tarif);
            $tarif->setGite($this);
        }

        return $this;
    }

    public function removeTarif(Tarif $tarif): static
    {
        if ($this->tarif->removeElement($tarif)) {
            // set the owning side to null (unless already changed)
            if ($tarif->getGite() === $this) {
                $tarif->setGite(null);
            }
        }

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    // public function __toString()
    // {
    //     return $this->nomGite;
    // }

    public function __toString()
    {
        return $this->tarif;
    }
}
