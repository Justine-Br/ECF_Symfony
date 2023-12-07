<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $disponibiliteContact = null;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: Gite::class)]
    private Collection $gite;

    public function __construct()
    {
        $this->gite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): static
    {
        $this->prenomContact = $prenomContact;

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

    public function getDisponibiliteContact(): ?string
    {
        return $this->disponibiliteContact;
    }

    public function setDisponibiliteContact(string $disponibiliteContact): static
    {
        $this->disponibiliteContact = $disponibiliteContact;

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
            $gite->setContact($this);
        }

        return $this;
    }

    public function removeGite(Gite $gite): static
    {
        if ($this->gite->removeElement($gite)) {
            // set the owning side to null (unless already changed)
            if ($gite->getContact() === $this) {
                $gite->setContact(null);
            }
        }

        return $this;
    }
}
