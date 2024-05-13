<?php

namespace App\Entity;

use App\Repository\LieuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuxRepository::class)]
class Lieux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Activation>
     */
    #[ORM\OneToMany(targetEntity: Activation::class, mappedBy: 'Lieux')]
    private Collection $activations;

    public function __construct()
    {
        $this->activations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Activation>
     */
    public function getActivations(): Collection
    {
        return $this->activations;
    }

    public function addActivation(Activation $activation): static
    {
        if (!$this->activations->contains($activation)) {
            $this->activations->add($activation);
            $activation->setLieux($this);
        }

        return $this;
    }

    public function removeActivation(Activation $activation): static
    {
        if ($this->activations->removeElement($activation)) {
            // set the owning side to null (unless already changed)
            if ($activation->getLieux() === $this) {
                $activation->setLieux(null);
            }
        }

        return $this;
    }
}
