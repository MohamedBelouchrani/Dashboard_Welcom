<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Logistiques>
     */
    #[ORM\OneToMany(targetEntity: Logistiques::class, mappedBy: 'ressource')]
    private Collection $Logistiques;

    /**
     * @var Collection<int, Goodies>
     */
    #[ORM\OneToMany(targetEntity: Goodies::class, mappedBy: 'ressource')]
    private Collection $Goodies;

    public function __construct()
    {
        $this->Logistiques = new ArrayCollection();
        $this->Goodies = new ArrayCollection();
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

    /**
     * @return Collection<int, Logistiques>
     */
    public function getLogistiques(): Collection
    {
        return $this->Logistiques;
    }

    public function addLogistique(Logistiques $logistique): static
    {
        if (!$this->Logistiques->contains($logistique)) {
            $this->Logistiques->add($logistique);
            $logistique->setRessource($this);
        }

        return $this;
    }

    public function removeLogistique(Logistiques $logistique): static
    {
        if ($this->Logistiques->removeElement($logistique)) {
            // set the owning side to null (unless already changed)
            if ($logistique->getRessource() === $this) {
                $logistique->setRessource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Goodies>
     */
    public function getGoodies(): Collection
    {
        return $this->Goodies;
    }

    public function addGoody(Goodies $goody): static
    {
        if (!$this->Goodies->contains($goody)) {
            $this->Goodies->add($goody);
            $goody->setRessource($this);
        }

        return $this;
    }

    public function removeGoody(Goodies $goody): static
    {
        if ($this->Goodies->removeElement($goody)) {
            // set the owning side to null (unless already changed)
            if ($goody->getRessource() === $this) {
                $goody->setRessource(null);
            }
        }

        return $this;
    }
}
