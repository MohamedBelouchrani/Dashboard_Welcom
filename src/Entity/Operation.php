<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRepository::class)]
class Operation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $chefProjet = null;

    #[ORM\Column(length: 255)]
    private ?string $urlAcces = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\ManyToOne(inversedBy: 'Operation')]
    private ?User $user = null;

    /**
     * @var Collection<int, Activation>
     */
    #[ORM\OneToMany(targetEntity: Activation::class, mappedBy: 'operation')]
    private Collection $Activation;

    /**
     * @var Collection<int, Application>
     */
    #[ORM\OneToMany(targetEntity: Application::class, mappedBy: 'operation')]
    private Collection $Application;

    /**
     * @var Collection<int, Sondage>
     */
    #[ORM\OneToMany(targetEntity: Sondage::class, mappedBy: 'operation')]
    private Collection $Sondage;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    public function __construct()
    {
        $this->Activation = new ArrayCollection();
        $this->Application = new ArrayCollection();
        $this->Sondage = new ArrayCollection();
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

    public function getChefProjet(): ?string
    {
        return $this->chefProjet;
    }

    public function setChefProjet(string $chefProjet): static
    {
        $this->chefProjet = $chefProjet;

        return $this;
    }

    public function getUrlAcces(): ?string
    {
        return $this->urlAcces;
    }

    public function setUrlAcces(string $urlAcces): static
    {
        $this->urlAcces = $urlAcces;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Activation>
     */
    public function getActivation(): Collection
    {
        return $this->Activation;
    }

    public function addActivation(Activation $activation): static
    {
        if (!$this->Activation->contains($activation)) {
            $this->Activation->add($activation);
            $activation->setOperation($this);
        }

        return $this;
    }

    public function removeActivation(Activation $activation): static
    {
        if ($this->Activation->removeElement($activation)) {
            // set the owning side to null (unless already changed)
            if ($activation->getOperation() === $this) {
                $activation->setOperation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplication(): Collection
    {
        return $this->Application;
    }

    public function addApplication(Application $application): static
    {
        if (!$this->Application->contains($application)) {
            $this->Application->add($application);
            $application->setOperation($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static
    {
        if ($this->Application->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getOperation() === $this) {
                $application->setOperation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sondage>
     */
    public function getSondage(): Collection
    {
        return $this->Sondage;
    }

    public function addSondage(Sondage $sondage): static
    {
        if (!$this->Sondage->contains($sondage)) {
            $this->Sondage->add($sondage);
            $sondage->setOperation($this);
        }

        return $this;
    }

    public function removeSondage(Sondage $sondage): static
    {
        if ($this->Sondage->removeElement($sondage)) {
            // set the owning side to null (unless already changed)
            if ($sondage->getOperation() === $this) {
                $sondage->setOperation(null);
            }
        }

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
}
