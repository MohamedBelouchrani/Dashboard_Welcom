<?php

namespace App\Entity;

use App\Repository\SondageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SondageRepository::class)]
class Sondage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $formulaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormulaire(): ?string
    {
        return $this->formulaire;
    }

    public function setFormulaire(string $formulaire): static
    {
        $this->formulaire = $formulaire;

        return $this;
    }
}
