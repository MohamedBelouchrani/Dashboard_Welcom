<?php

namespace App\Entity;

use App\Repository\ActivationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivationRepository::class)]
class Activation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $objectif = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'Activation')]
    private ?Operation $operation = null;

    #[ORM\ManyToOne(inversedBy: 'activations')]
    private ?Lieux $Lieux = null;

    /**
     * @var Collection<int, Ressources>
     */
    #[ORM\OneToMany(targetEntity: Ressources::class, mappedBy: 'activation')]
    private Collection $Ressources;

    public function __construct()
    {
        $this->Ressources = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): static
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(?Operation $operation): static
    {
        $this->operation = $operation;

        return $this;
    }

    public function getLieux(): ?Lieux
    {
        return $this->Lieux;
    }

    public function setLieux(?Lieux $Lieux): static
    {
        $this->Lieux = $Lieux;

        return $this;
    }

    /**
     * @return Collection<int, Ressources>
     */
    public function getRessources(): Collection
    {
        return $this->Ressources;
    }

    public function addRessource(Ressources $ressource): static
    {
        if (!$this->Ressources->contains($ressource)) {
            $this->Ressources->add($ressource);
            $ressource->setActivation($this);
        }

        return $this;
    }

    public function removeRessource(Ressources $ressource): static
    {
        if ($this->Ressources->removeElement($ressource)) {
            // set the owning side to null (unless already changed)
            if ($ressource->getActivation() === $this) {
                $ressource->setActivation(null);
            }
        }

        return $this;
    }
}
