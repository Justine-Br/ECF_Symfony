<?php

namespace App\Entity;

use App\Repository\ServicePayantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicePayantRepository::class)]
class ServicePayant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomService = null;

    #[ORM\Column]
    private ?bool $disponibiliteService = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $supplement = null;

    #[ORM\ManyToMany(targetEntity: Gite::class, inversedBy: 'servicePayants')]
    private Collection $gite;

    public function __construct()
    {
        $this->gite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): static
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function isDisponibiliteService(): ?bool
    {
        return $this->disponibiliteService;
    }

    public function setDisponibiliteService(bool $disponibiliteService): static
    {
        $this->disponibiliteService = $disponibiliteService;

        return $this;
    }

    public function getSupplement(): ?string
    {
        return $this->supplement;
    }

    public function setSupplement(string $supplement): static
    {
        $this->supplement = $supplement;

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
        }

        return $this;
    }

    public function removeGite(Gite $gite): static
    {
        $this->gite->removeElement($gite);

        return $this;
    }

    public function __toString()
    {
        return $this->nomService;
    }
}
