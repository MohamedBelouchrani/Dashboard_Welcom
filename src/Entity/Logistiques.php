<?php

namespace App\Entity;

use App\Repository\LogistiquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogistiquesRepository::class)]
class Logistiques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\Column]
    private ?int $quantites = null;

    #[ORM\ManyToOne(inversedBy: 'Logistiques')]
    private ?Ressource $ressource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getQuantites(): ?int
    {
        return $this->quantites;
    }

    public function setQuantites(int $quantites): static
    {
        $this->quantites = $quantites;

        return $this;
    }

    public function getRessource(): ?Ressource
    {
        return $this->ressource;
    }

    public function setRessource(?Ressource $ressource): static
    {
        $this->ressource = $ressource;

        return $this;
    }
}
